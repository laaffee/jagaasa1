<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class BannerController extends Controller
{
        
    /**
     * index
     *
     * @return void
     */
    public function bannerlink()
    {
        $banners = Banner::where('kategori', '0')->where('status', '1')->orderby('tgl_publish','DESC')->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Banner Link"
            ],
            "data" => $banners
        ], 200);
    }
    public function banneriklan()
    {
        $banners = Banner::where('kategori','1')->where('status', '1')->orderby('tgl_publish','DESC')->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Banner Iklan"
            ],
            "data" => $banners
        ], 200);
    }
}