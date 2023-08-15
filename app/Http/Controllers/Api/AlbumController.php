<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Album;

class AlbumController extends Controller
{
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $albums = Album::orderby('tgl_album', 'DESC')->paginate(6);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Album"
            ],
            "data" => $albums
        ], 200);
    }
}