<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{

    public function index()
    {
        $title      = "Kategori";

        $data       = Kategori::all();

        return view('admin.kategori.index', compact('title', 'data'));
    }

    public function create()
    {
        $title      = "Tambah Kategori";

        return view('admin.kategori.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'              => 'required',
        ], [
            'nama.required'     => 'Nama Kategori belum diisi',
        ]);

        $kategori = Kategori::create([
            'nama'      => $request->input('nama'),

        ]);

        $kategori->save();

        if ($kategori) {
            // Logactivity::addLog(Auth::user()->id, '<b>Tambah Data Donatur</b> : ' . $request->input('nama'));

            //redirect dengan pesan sukses
            return redirect()->route('admin.kategori.index')->with(['success' => 'Data Kategori Berhasil Disimpan']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.kategori.index')->with(['error' => 'Data Kategori Gagal Disimpan']);
        }
    }

    public function edit($id)
    {
        $title      = "Ubah Kategori";
        $data       = Kategori::findOrFail($id);
        // $kategori   = Kategori::where('kategori.parent', '7')->get();
        // // $tags    = Tags::latest()->get();

        return view('admin.kategori.edit', compact('title', 'data'));
    }

    public function update(Request $request, $id)
    {
        $data   = Kategori::findOrFail($id);

        $this->validate($request, [
            'nama'          => 'required',
        ], [
            'nama.required' => 'Nama belum diisi',
        ]);

        $data = Kategori::findOrFail($id);
        $kategori = Kategori::where('id', $id)->update([
            'nama'          => $request->input('nama'),
        ]);


        if ($kategori) {
            // Logactivity::addLog(Auth::user()->id, '<b>Ubah Data Berita</b> : ' . $request->input('judul'));

            //redirect dengan pesan sukses
            return redirect()->route('admin.kategori.index')->with(['success' => 'Data Kategori Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.kategori.index')->with(['error' => 'Data Kategori Gagal Diupdate']);
        }
    }

    public function destroy($id)
    {
        $data       = Kategori::findOrFail($id);
        $kategori   = $data->nama;

        $del        = $data->delete();

        if ($del) {
            // Logactivity::addLog(Auth::user()->id, '<b>Hapus Data Kategori</b> : ' . $kategori);

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
