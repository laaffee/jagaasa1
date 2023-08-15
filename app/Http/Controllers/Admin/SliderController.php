<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Slider;
use App\Models\Logactivity;
use App\Models\Webconfig;
use Auth;

class SliderController extends Controller
{
    public function __construct() 
    {
        $this->website  = Webconfig::get()->first()->nama_web;
    }

    public function index()
    {
        $website    = $this->website;
        $title      = "Slider";

        $sliders    = Slider::orderby('tgl_publish', 'desc')->get();
        
        return view('admin.slider.index', compact('website', 'title', 'sliders'));
    }

    public function create()
    {
        $website    = $this->website;
        $title      = "Tambah Slider";
        
        return view('admin.slider.create', compact('website', 'title'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'judul'         => 'required|unique:sliders',
            'tgl_publish'   => 'required',
            'status'        => 'required',
            'gambar'        => 'required|image|mimes:jpeg,jpg,png|max:1024',

        ],[
            'judul.required'            => 'Judul Slide Harus Diisi',
            'tgl_publish.required'      => 'Tanggal Publish Belum Diisi',
            'status.required'           => 'Status Publish Belum Diisi',
            'gambar.required'           => 'Gambar Harus Diupload',
            'gambar.image'              => 'File yang diupload harus berupa file gambar',
            'gambar.mimes'              => 'Gambar Harus Berformat jpeg/jpg/png',
            'gambar.max'                => 'Gambar Maksimal ukuran 1 MB',
        ]);
        
        //upload image
        $image = $request->file('gambar');
        $image->storeAs('public/slide', $image->hashName());
        
        $slider = slider::create([
            'judul'       => $request->input('judul'),
            'status'      => $request->input('status'),  
            'gambar'      => $image->hashName(),
            'tgl_publish' => $request->input('tgl_publish'),  
            'slug'        => Str::slug($request->input('judul'), '-'),
        ]);
        
        if($slider){
            Logactivity::addLog(Auth::user()->id, '<b>Tambah Data Slider</b> : '.$request->input('judul'));

            //redirect dengan pesan sukses
            return redirect()->route('admin.slider.index')->with(['success' => 'Data Slider Berhasil Disimpan']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.slider.index')->with(['error' => 'Data Slider Gagal Disimpan']);
        }

    }

    public function edit($id)
    {
        $website    = $this->website;
        $title      = "Ubah Slider";

        $data       = slider::findOrFail($id);

        return view('admin.slider.edit', compact('website', 'title', 'data'));
    }

    // public function edit(slider $slider)
    // {
    //     $tags = Tags::latest()->get();
    //     $kategori = Kategori_slider::latest()->get();
    //     return view('admin.slider.edit', compact('slider', 'tags', 'kategori'));
    // }

    public function update(Request $request, $id)
    {
        $get    = slider::findOrFail($id);
        $judul  = $get->judul;
       
        $this->validate($request,[
            'judul'         => 'required|unique:sliders',
            'tgl_publish'   => 'required',
            'status'        => 'required',
            'gambar'        => 'image|mimes:jpeg,jpg,png|max:1024',

        ],[
            'judul.required'            => 'Judul Slide Harus Diisi',
            'tgl_publish.required'      => 'Tanggal Publish Belum Diisi',
            'status.required'           => 'Status Publish Belum Diisi',
            'gambar.image'              => 'File yang diupload harus berupa file gambar',
            'gambar.mimes'              => 'Gambar Harus Berformat jpeg/jpg/png',
            'gambar.max'                => 'Gambar Maksimal ukuran 1 MB',
        ]);

        if ($request->file('gambar') == "") {
        
            $data = slider::findOrFail($id);
            $data->update([
                'judul'       => $request->input('judul'),
                'status'      => $request->input('status'),  
                'tgl_publish' => $request->input('tgl_publish'),  
                'slug'        => Str::slug($request->input('judul'), '-'),  
            ]);

        } else {

            //remove old image
            Storage::disk('local')->delete('public/slide/'.basename($get->gambar));

            //upload new image
            $image = $request->file('gambar');
            $image->storeAs('public/slide', $image->hashName());

            $data = slider::findOrFail($id);
            $data->update([
                'judul'       => $request->input('judul'),
                'status'      => $request->input('status'),  
                'gambar'      => $image->hashName(),
                'tgl_publish' => $request->input('tgl_publish'),  
                'slug'        => Str::slug($request->input('judul'), '-'),
            ]);

        }

        if($data){

            if($judul != $request->input('judul')) 
            {
                Logactivity::addLog(Auth::user()->id, '<b>Ubah Data Slider</b> : '.$judul.' <b>Menjadi : </b>'.$request->input('judul'));
            }
                Logactivity::addLog(Auth::user()->id, '<b>Ubah Data Slider</b> : '.$request->input('judul'));

            //redirect dengan pesan sukses
            return redirect()->route('admin.slider.index')->with(['success' => 'Data Slider Berhasil Diupdate']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.slider.index')->with(['error' => 'Data Slider Gagal Diupdate']);
        }

    }

    public function destroy($id)
    {
        $data   = slider::findOrFail($id);
        $image  = Storage::disk('local')->delete('public/slide/'.basename($data->gambar));
        $slider = $data->judul;
        
        $del    = $data->delete();

        if ($del) {
            Logactivity::addLog(Auth::user()->id, '<b>Hapus Data Slider</b> : '.$slider);

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