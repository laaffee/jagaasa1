<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataStatis;

/**
 * beritaController
 */
class DataStatisController extends Controller
{

    /**
     * index
     *
     * @return void
     */
    public function index() // profil
    {
        $profil = DataStatis::where('id', '=', '1')->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Statis Profil"
            ],
            "data" => $profil
        ], 200);
    }

    public function sambutan()
    {
        $sambutan = DataStatis::where('id', '=', '2')->get();

        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Statis Sambutan"
            ],
            "data" => $sambutan
        ], 200);
    }

    public function kepala()
    {
        $kepala = DataStatis::where('id', '=', '3')->get();

        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Statis Kepala"
            ],
            "data" => $kepala
        ], 200);
    }

    public function visimisi()
    {
        $visimisi = DataStatis::where('id', '=', '4')->get();

        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Statis Visi dan Misi"
            ],
            "data" => $visimisi
        ], 200);
    }

    public function datapejabat()
    {
        $datapejabat = DataStatis::where('id', '=', '5')->get();

        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Statis Pejabat"
            ],
            "data" => $datapejabat
        ], 200);
    }

    public function struktur()
    {
        $struktur = DataStatis::where('id', '=', '6')->get();

        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Statis Struktur Organisasi"
            ],
            "data" => $struktur
        ], 200);
    }

    public function tupoksi()
    {
        $tupoksi = DataStatis::where('id', '=', '7')->get();

        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Statis Tupoksi"
            ],
            "data" => $tupoksi
        ], 200);
    }


    public function demografi()
    {
        $demografi = DataStatis::where('id', '=', '25')->get();

        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Statis Demografi"
            ],
            "data" => $demografi
        ], 200);
    }

    public function profilposyandu()
    {
        $profilposyandu = DataStatis::where('id', '=', '26')->get();

        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Profil Posyandu"
            ],
            "data" => $profilposyandu
        ], 200);
    }

    public function dataposyandu()
    {
        $dataposyandu = DataStatis::where('id', '=', '27')->get();

        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Posyandu"
            ],
            "data" => $dataposyandu
        ], 200);
    }



    public function pelaksana()
    {
        $pelaksana = DataStatis::where('id', '=', '8')->get();

        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Statis Pelaksana"
            ],
            "data" => $pelaksana
        ], 200);
    }

    public function kontak()
    {
        $kontak = DataStatis::where('id', '=', '10')->get();

        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Statis Kontak"
            ],
            "data" => $kontak
        ], 200);
    }

    public function eoffice()
    {
        $eoffice = DataStatis::where('kategori_id', '=', '54')->get();

        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Statis E-Office"
            ],
            "data" => $eoffice
        ], 200);
    }

    public function sibadra()
    {
        $sibadra = DataStatis::where('kategori_id', '=', '55')->get();

        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Statis SiBadra"
            ],
            "data" => $sibadra
        ], 200);
    }

    public function span()
    {
        $span = DataStatis::where('kategori_id', '=', '56')->get();

        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Statis SP4N Lapor"
            ],
            "data" => $span
        ], 200);
    }

    public function whatsapp()
    {
        $whatsapp = DataStatis::where('kategori_id', '=', '57')->get();

        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Statis Whatsapp"
            ],
            "data" => $whatsapp
        ], 200);
    }

    public function instagram()
    {
        $instagram = DataStatis::where('kategori_id', '=', '58')->get();

        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "Data Statis Instagram"
            ],
            "data" => $instagram
        ], 200);
    }
}
