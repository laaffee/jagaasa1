<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slider;

class SliderController extends Controller
{
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $sliders = Slider::where('status', '=', '1')->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Sliders"
            ],
            "data" => $sliders
        ], 200);
    }
}