<?php

namespace App\Http\Controllers\Admin;

use App\Models\Donatur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonaturController extends Controller
{

    public function index()
    {
        $title      = "Donatur";

        $data       = Donatur::all();

        return view('admin.donatur.index', compact('title', 'data'));
    }


    public function create()
    {
        $title      = "Tambah Donatur";

        return view('admin.donatur.create', compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'jenis'         => 'required',
            'alamat'        => 'required',
            'telp'          => 'required'
        ], [
            'name.required'         => 'Nama belum diisi',
            'jenis.required'        => 'Jenis belum diisi',
            'alamat.required'       => 'Alamat belum diisi',
            'telp.required'         => 'Telepon belum diisi'
        ]);

        $donatur = Donatur::create([
            'nama'          => $request->input('name'),
            'jenis'         => $request->input('jenis'),
            'alamat'        => $request->input('alamat'),
            'telp'          => $request->input('telp'),
            'narahubung'    => $request->input('narahubung')
        ]);

        //assign tags
        // $berita->tags()->attach($request->input('tags'));
        $donatur->save();

        if ($donatur) {
            // Logactivity::addLog(Auth::user()->id, '<b>Tambah Data Donatur</b> : ' . $request->input('nama'));

            //redirect dengan pesan sukses
            return redirect()->route('admin.donatur.index')->with(['success' => 'Data Donatur Berhasil Disimpan']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.donatur.index')->with(['error' => 'Data Donatur Gagal Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Donatur $donatur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title      = "Ubah Donatur";
        $data       = Donatur::findOrFail($id);
        // $kategori   = Kategori::where('kategori.parent', '7')->get();
        // // $tags    = Tags::latest()->get();

        return view('admin.donatur.edit', compact('title', 'data'));
    }

    public function update(Request $request, $id)
    {
        $donatur   = Donatur::findOrFail($id);

        $this->validate($request, [
            'name'          => 'required',
            'jenis'         => 'required',
            'alamat'         => 'required',
            'telp'           => 'required'
        ], [
            'name.required'         => 'Nama belum diisi',
            'jenis.required'        => 'Jenis belum diisi',
            'alamat.required'       => 'Alamat Berita belum diisi',
            'telp.required'         => 'Telepon belum diisi'
        ]);

        $donatur->update([
            'name'          => $request->input('name'),
            'jenis'         => $request->input('jenis'),
            'alamat'        => $request->input('alamat'),
            'telp'          => $request->input('telp'),
            'narahubung'    => $request->input('narahubung')
        ]);


        if ($donatur) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.donatur.index')->with(['success' => 'Data Donatur Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.donatur.index')->with(['error' => 'Data Donatur Gagal Diupdate']);
        }
    }

    public function destroy($id)
    {
        $data       = Donatur::findOrFail($id);

        $del        = $data->delete();

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
