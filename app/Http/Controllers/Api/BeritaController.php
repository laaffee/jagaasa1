<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kategori;

/**
 * beritaController
 */
class BeritaController extends Controller
{
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $beritas = Berita::join('kategori', 'berita.kategori_id', '=', 'kategori.id')
                    ->orderby('tgl','DESC')->paginate(3);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data beritas"
            ],
            "data" => $beritas
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
        // $berita = berita::where('slug', $slug)->first();
        $berita = berita::join('kategori', 'berita.kategori_id', '=', 'kategori.id')
                    ->select('berita.*', 'kategori.kategori_nama')
                    ->where('berita.slug', $slug)->first();

        if($berita) {

            return response()->json([
                "response" => [
                    "status"    => 200,
                    "message"   => "Detail Data berita"
                ],
                "data" => $berita
            ], 200);

        } else {

            return response()->json([
                "response" => [
                    "status"    => 404,
                    "message"   => "Data berita Tidak Ditemukan!"
                ],
                "data" => null
            ], 404);

        }
    }

    public function kategori()
    {
        // id kategori 6 = Berita
        $kategori = Kategori::where('parent', '=', '7')->orderby('id','ASC')->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Kategori Berita"
            ],
            "data" => $kategori
        ], 200);
    }

    
    /**
     * beritaHomePage
     *
     * @return void
     */
    public function beritaHomePage()
    {
        // $beritas = berita::latest()->take(3)->orderby('tgl', 'desc')->get();
        $beritas = Berita::join('kategori', 'berita.kategori_id', '=', 'kategori.id')
                        ->select('berita.*', 'kategori.kategori_nama')
                        ->latest()
                        ->take(6)
                        ->orderby('tgl', 'desc')->paginate(6);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data beritas Homepage"
            ],
            "data" => $beritas
        ], 200);
    }

    public function beritakategori($id)
    {
        // $kat = ;
        $Beritakat = Berita::Join('kategori','berita.kategori_id', '=', 'kategori.id')
                    ->select('berita.*', 'kategori.kategori_nama')
                    ->take(5)
                    ->where('kategori_id',$id)
                    ->orderBy('berita.tgl', 'desc')
                    ->paginate(3);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Berita Kategori"
            ],
            "data" => $Beritakat
        ], 200);
    }

}