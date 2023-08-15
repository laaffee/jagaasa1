<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sasaran;
use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SasaranController extends Controller
{
    public function index()
    {
        $title      = "Sasaran Bantuan";

        $data       = Sasaran::join('kategori', 'sasaran_bantuan.kategori_id', '=', 'kategori.id')
                    ->orderBy('id', 'desc')
                    ->get(['sasaran_bantuan.id', 'kategori.nama', 'sasaran_bantuan.nama AS namadonasi', 'sasaran_bantuan.tanggal', 'sasaran_bantuan.stunting_id']);

        return view('admin.sasaran.index', compact('title', 'data'));
    }

    public function create()
    {
        $title      = "Tambah Data Donasi";

        $kategori   = Kategori::all();

        return view('admin.sasaran.create', compact('title', 'kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori_id'   => 'required',
            'nama'          => 'required|unique:donasi',
            'tanggal'       => 'required',
            'deskripsi'     => 'required',
            'foto'          => 'image|mimes:jpeg,jpg,png|max:1024',
        ], [
            'kategori_id.required'  => 'Kategori belum dipilih',
            'nama.required'         => 'Nama Donasi belum diisi',
            'tanggal.required'      => 'Tanggal Donasi belum diisi',
            'deskripsi.required'    => 'Deskripsi belum diisi',
            'foto.image'            => 'File upload harus berupa file gambar',
            'foto.mimes'            => 'Format file harus berekstensi jpg/jpeg/png',
            'foto.max'              => 'Ukuran file tidak bisa lebih dari 1 MB',
        ]);

        if($request->file('foto'))
        {
            //upload image
            $image  = $request->file('foto');
            $image->storeAs('public/donasi', $image->hashName());

            $donasi = Donasi::create([
                'kategori_id' => $request->input('kategori_id'),
                'stunting_id' => 0,
                'nama'        => $request->input('nama'),
                'tanggal'     => $request->input('tanggal'),
                'deskripsi'   => $request->input('deskripsi'),
                'foto'        => $image->hashName()
            ]);
        }
        else {
            $donasi = Donasi::create([
                'kategori_id' => $request->input('kategori_id'),
                'stunting_id' => 0,
                'nama'        => $request->input('nama'),
                'tanggal'     => $request->input('tanggal'),
                'deskripsi'   => $request->input('deskripsi')
            ]);
        }
        
        $donasi->save();

        if ($donasi) {
            return redirect()->route('admin.donasi.index')->with(['success' => 'Data Donasi Berhasil Disimpan']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.donasi.index')->with(['error' => 'Data Donasi Gagal Disimpan']);
        }
    }
}
