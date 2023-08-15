<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bantuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BantuanController extends Controller
{

    public function index()
    {

        $title      = "Bantuan";

        $data       = Bantuan::all();

        return view('admin.bantuan.index', compact('title', 'data'));
    }


    public function create()
    {

        $title      = "Tambah Bantuan";

        return view('admin.bantuan.create', compact('title'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'jenisbantuan_id'       => 'required',
            'target'                => 'required',
            'satuan'                => 'required',
            'status'                => 'required'
        ], [
            'jenisbantuan_id.required'       => 'Jenis Bantuan belum diisi',
            'target.required'                => 'Target belum diisi',
            'satuan.required'                => 'Satuan belum diisi',
            'status.required'                => 'Status belum diisi'
        ]);

        $bantuan = Bantuan::create([
            'target'                => $request->input('target'),
            'satuan'                => $request->input('satuan'),
            'status'                => $request->input('status'),

        ]);

        $bantuan->save();

        if ($bantuan) {
            // Logactivity::addLog(Auth::user()->id, '<b>Tambah Data Donatur</b> : ' . $request->input('nama'));

            //redirect dengan pesan sukses
            return redirect()->route('admin.bantuan.index')->with(['success' => 'Data Bantuan Berhasil Disimpan']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.bantuan.index')->with(['error' => 'Data Bantuan Gagal Disimpan']);
        }
    }


    public function show(Bantuan $bantuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title      = "Ubah Bantuan";
        $data       = Bantuan::findOrFail($id);
        // $kategori   = Kategori::where('kategori.parent', '7')->get();
        // // $tags    = Tags::latest()->get();

        return view('admin.bantuan.edit', compact('title', 'data'));
    }


    public function update(Request $request, $id)
    {
        $data   = Bantuan::findOrFail($id);

        $this->validate($request, [
            'jenisbantuan_id'       => 'required',
            'target'                => 'required',
            'satuan'                => 'required',
            'status'                => 'required'
        ], [
            'jenisbantuan_id.required'  => 'Jenis Bantuan belum diisi',
            'target.required'           => 'Target belum diisi',
            'satuan.required'           => 'Satuan belum diisi',
            'status.required'           => 'Status belum diisi'
        ]);

        $data = Bantuan::findOrFail($id);
        $bantuan = Bantuan::where('id', $id)->update([
            'jenisbantuan_id'       => $request->input('jenisbantuan_id'),
            'target'                => $request->input('target'),
            'satuan'                => $request->input('satuan'),
            'status'                => $request->input('status')
        ]);


        if ($bantuan) {
            // Logactivity::addLog(Auth::user()->id, '<b>Ubah Data Berita</b> : ' . $request->input('judul'));

            //redirect dengan pesan sukses
            return redirect()->route('admin.bantuan.index')->with(['success' => 'Data Bantuan Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.bantuan.index')->with(['error' => 'Data Bantuan Gagal Diupdate']);
        }
    }


    public function destroy($id)
    {

        $data       = Bantuan::findOrFail($id);
        $jenisbantuan_id   = $data->jenisbantuan_id;

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
