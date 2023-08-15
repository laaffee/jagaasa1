<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function index()
    {
        $tanggal        =   date('Y-m-d', strtotime('now'));    // hari ini
        $bulan          =   date('m', strtotime('now'));        // bulan ini
        $bulanlalu      =   date('Y-m', strtotime('-1 months'));  // bulan lalu
        $tahun          =   date('Y', strtotime('now'));        // tahun ini
        $tahunlalu      =   date('Y', strtotime('-1 years'));   // tahun lalu

        $today_visit        =   Visitor::whereDate('created_at', '=', $tanggal)->get()->count();
        $month_visit        =   Visitor::whereMonth('created_at', '=', $bulan)
                                ->whereYear('created_at', '=', $tahun)->get()->count();
        $lastmonth_visit    =   Visitor::where('created_at', 'LIKE', '%'.$bulanlalu.'%')->get()->count();
        $total_visitor      =   Visitor::count('id');
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Jumlah Data Visitor"
            ],
            "hari_ini"          => $today_visit,
            "bulan_ini"         => $month_visit,
            "bulan_lalu"        => $lastmonth_visit,
            "total_kunjungan"   => $total_visitor + 100313

        ], 200);
    }

    public function addvisitor($ip)
    {
        $tanggal        =   date('Y-m-d', strtotime('now'));
        $visitor        =   Visitor::whereDate('created_at', '=', $tanggal)
                            ->where('ip', '=', $ip)->get()->count();

        if($visitor == '0') {
            Visitor::create([
                'ip'           => $ip,
            ]);

            return response()->json([
                "response" => [
                    "status"    => 200,
                    "message"   => "Data Visitor Berhasil Tersimpan"
                ]
            ], 200);
        }

            return response()->json([
                "response" => [
                    "status"    => 200,
                    "message"   => "Data Visitor Tidak Tersimpan"
                ],
            ], 200);
    }
    
    // public function index()
    // {
    //     $visitor        =   Visitor::orderBy('id', 'desc')->take(2)->get(['id', 'tanggal', 'totalkunjungan']);
    //     $totalvisitor   =   Visitor::sum('totalkunjungan');
    //     return response()->json([
    //         "response" => [
    //             "status"    => 200,
    //             "message"   => "Data Visitor"
    //         ],
    //         "data" => $visitor,
    //         "totalkunjungan" => $totalvisitor
    //     ], 200);
    // }

    // public function visitor()
    // {
    //     $tanggal        =   Carbon::now()->format('m-Y');
    //     $visitor        =   Visitor::where('tanggal', '=', $tanggal)->get()->first();

    //     if($visitor) {
    //         $visitor->increment('totalkunjungan', 1);
    //     }
    //     else {
    //         Visitor::create([
    //             'tanggal'           => $tanggal,
    //             'totalkunjungan'    => 1,
    //         ]);
    //     }
    
    // }
}
