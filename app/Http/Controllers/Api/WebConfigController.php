<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebConfig;

class WebConfigController extends Controller
{
    public function webconfig()
    {
        $webconfigs = Webconfig::all();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Konfigurasi Website"
            ],
            "data" => $webconfigs
        ], 200);
    }
}
