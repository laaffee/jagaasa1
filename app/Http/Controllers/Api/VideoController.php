<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Video;

class VideoController extends Controller
{
    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $videos = Video::orderby('tgl_video', 'DESC')->paginate(3);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Video"
            ],
            "data" => $videos
        ], 200);
    }
    
    /**
     * VideoHomePage
     *
     * @return void
     */
    public function VideoHomePage()
    {
        $videos = Video::orderby('tgl_video', 'DESC')->take(2)->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Video Homepage"
            ],
            "data" => $videos
        ], 200);
    }
}