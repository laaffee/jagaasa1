<?php

namespace App\Http\Controllers\Api;

use App\Models\Agenda;
use App\Http\Controllers\Controller;
 
class AgendaController extends Controller
{
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $agendas = Agenda::latest()->paginate(4);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Agenda"
            ],
            "data" => $agendas
        ], 200);
    }

        
    /**
     * show
     *
     * @param  mixed $slug
     * @return void
     */
    public function show($slug)
    {
        $agenda = Agenda::where('slug', $slug)->first();

        if($agenda) {

            return response()->json([
                "response" => [
                    "status"    => 200,
                    "message"   => "Detail Data Agenda"
                ],
                "data" => $agenda
            ], 200);

        } else {

            return response()->json([
                "response" => [
                    "status"    => 404,
                    "message"   => "Data Agenda Tidak Ditemukan!"
                ],
                "data" => null
            ], 404);

        }
    }
    
    /**
     * agendaHomePage
     *
     * @return void
     */
    public function AgendaHomePage()
    {
        $agendas = agenda::orderBy('tgl_agenda', 'desc')->take(10)->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Agenda Homepage"
            ],
            "data" => $agendas
        ], 200);
    }

}