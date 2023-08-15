<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumens = Dokumen::join('kategori', 'kategori.id', '=', 'dokumen.kategori_id')
                        ->select('dokumen.*', 'kategori.kategori_nama')
                        ->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Dokumen"
            ],
            "data" => $dokumens
        ], 200);
    }

    public function show($id)
    {
        $data = Dokumen::join('kategori','dokumens.kategori_id', '=', 'kategori.id')
                    ->select('dokumens.*', 'kategori.kategori_nama')
                    ->where('dokumens.kategori_id', $id)->first();

        if($data) {

            return response()->json([
                "response" => [
                    "status"    => 200,
                    "message"   => "Detail Dokumen"
                ],
                "data" => $data
            ], 200);

        } else {

            return response()->json([
                "response" => [
                    "status"    => 404,
                    "message"   => "Data Dokumen Tidak Ditemukan!"
                ],
                "data" => null
            ], 404);

        }
    }

    public function kategoridokumen()
    {
        $katdok = KategoriData::all();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Statis"
            ],
            "data" => $katdok
        ], 200);
    }
}
