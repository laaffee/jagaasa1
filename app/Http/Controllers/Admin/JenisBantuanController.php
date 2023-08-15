<?php

namespace App\Http\Controllers\Admin;

use App\Models\JenisBantuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JenisBantuanController extends Controller
{

    public function index()
    {
        $title      = "Jenis Bantuan";

        $data       = JenisBantuan::all();

        return view('admin.jenisbantuan.index', compact('title', 'data'));
    }


    public function create()
    {
        $title      = "Tambah Jenis Bantuan";

        return view('admin.jenisbantuan.create', compact('title'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'jenis_bantuan'                   => 'required',
            'nama_bantuan'                    => 'required',
            'satuan'                          => 'required'
        ], [
            'jenis_bantuan.required'          => 'Jenis Bantuan belum diisi',
            'nama_bantuan.required'           => 'Nama Bantuan belum diisi',
            'satuan.required'                 => 'Satuan belum diisi'

        ]);

        $jenisbantuan = JenisBantuan::create([
            'jenis'                   => $request->input('jenis_bantuan'),
            'nama'                    => $request->input('nama_bantuan'),
            'satuan'                  => $request->input('satuan')
        ]);

        $jenisbantuan->save();

        if ($jenisbantuan) {
            // Logactivity::addLog(Auth::user()->id, '<b>Tambah Data Donatur</b> : ' . $request->input('nama'));

            //redirect dengan pesan sukses
            return redirect()->route('admin.jenisbantuan.index')->with(['success' => 'Data Jenis Bantuan Berhasil Disimpan']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.jenisbantuan.index')->with(['error' => 'Data Jenis Bantuan Gagal Disimpan']);
        }
    }


    public function show(JenisBantuan $jenisBantuan)
    {
    }


    public function edit($id)
    {
        $title      = "Ubah Jenis Bantuan";
        $data       = JenisBantuan::findOrFail($id);

        return view('admin.jenisbantuan.edit', compact('title', 'data'));
    }


    public function update(Request $request, $id)
    {
        $data   = JenisBantuan::findOrFail($id);

        $this->validate($request, [
            'jenis_bantuan'                   => 'required',
            'nama_bantuan'                    => 'required',
            'satuan'                          => 'required'
        ], [
            'jenis_bantuan.required'          => 'Jenis Bantuan belum diisi',
            'nama_bantuan.required'           => 'Nama Bantuan belum diisi',
            'satuan.required'                 => 'Satuan belum diisi'

        ]);

        $data = JenisBantuan::findOrFail($id);
        $jenisbantuan = JenisBantuan::where('id', $id)->update([
            'jenis_bantuan'       => $request->input('jenis_bantuan'),
            'nama_bantuan'        => $request->input('nama_bantuan'),
            'satuan'              => $request->input('satuan')
        ]);


        if ($jenisbantuan) {
            // Logactivity::addLog(Auth::user()->id, '<b>Ubah Data Berita</b> : ' . $request->input('judul'));

            //redirect dengan pesan sukses
            return redirect()->route('admin.jenisbantuan.index')->with(['success' => 'Data Jenis Bantuan Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.jenisbantuan.index')->with(['error' => 'Data Jenis Bantuan Gagal Diupdate!']);
        }
    }


    public function destroy($id)
    { {
            $data           = JenisBantuan::findOrFail($id);
            $jenisbantuan   = $data->jenis_bantuan;

            $del            = $data->delete();

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
}
