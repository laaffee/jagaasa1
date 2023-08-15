<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logactivity;
use App\Models\WebConfig;
use DB;

class DashboardController extends Controller
{    
    public function __construct() 
    {
        $this->website  = Webconfig::get()->first()->nama_web;
    }

    public function index()
    {
        $website    = $this->website;
        $title      = "Dashboard";

        $data       = Logactivity::with('user')->orderby('logactivity.id', 'desc')->get();

        return view('admin.dashboard.index', compact('website', 'title', 'data'));
    }

    public static function clear_log()
    {
        $del = DB::table('logactivity')->delete();

        DB::update("ALTER TABLE logactivity AUTO_INCREMENT = 1;");

        if ($del) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}