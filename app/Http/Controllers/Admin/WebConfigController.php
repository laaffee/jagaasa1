<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebConfig;
use App\Models\Logactivity;
use Auth;

class WebConfigController extends Controller
{
    public function __construct()
    {
        $this->website  = WebConfig::get()->first()->nama_web;
    }

    public function index()
    {
        $website    = $this->website;
        $title      = "Web Config";

        $webconfig  = WebConfig::get()->first();

        return view('admin.webconfig.index', compact('website', 'title', 'webconfig'));
    }

    public function edit(WebConfig $webconfig)
    {
        $website    = $this->website;
        $title      = "Ubah Web Config";

        return view('admin.webconfig.edit', compact('website', 'title', 'webconfig'));
    }

    public function update(Request $request, WebConfig $webconfig)
    {
        $this->validate($request, [
            'nama_web'  => 'required',
            'deskripsi' => 'required',
            'alamat'    => 'required',
            'email'     => 'required',
            'url_admin' => 'required',
        ],[
            'nama_web.required'     => 'Nama Website Belum Diisi',
            'deskripsi.required'    => 'Deskripsi Belum Diisi',
            'alamat.required'       => 'Alamat Belum Diisi',
            'email.required'        => 'Email Belum Diisi',
            'url_admin.required'    => 'URL Admin Belum Diisi',
        ]);

        $webconfig  = WebConfig::findOrFail($webconfig->id);
        $web        = $webconfig->nama_web;

        $webconfig->update([
            'nama_web'      => $request->input('nama_web'),
            'url_publik'    => $request->input('url_publik'),
            'url_admin'     => $request->input('url_admin'),
            'nama_web'      => $request->input('nama_web'),
            'deskripsi'     => $request->input('deskripsi'),
            'alamat'        => $request->input('alamat'),
            'email'         => $request->input('email'),
            'telp'          => $request->input('telp'),
            'fax'           => $request->input('fax'),
            'fb'            => $request->input('fb'),
            'url_fb'        => $request->input('url_fb'),
            'ig'            => $request->input('ig'),
            'url_ig'        => $request->input('url_ig'),
            'twitter'       => $request->input('twitter'),
            'url_twitter'   => $request->input('url_twitter'),
            'youtube'       => $request->input('youtube'),
            'url_youtube'   => $request->input('url_youtube'),
        ]);

        if($webconfig){

            if($web != $request->input('nama_web'))
            {
                Logactivity::addLog(Auth::user()->id, '<b>Ubah Data Web Config</b> : '.$web.' <b>Menjadi : </b>'.$request->input('nama_web'));
            }
                Logactivity::addLog(Auth::user()->id, '<b>Ubah Data Web Config</b> : '.$request->input('nama_web'));

            //redirect dengan pesan sukses
            return redirect()->route('admin.webconfig.index')->with(['success' => 'Data Web Config Berhasil Diupdate']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.webconfig.index')->with(['error' => 'Data Web Config Gagal Diupdate']);
        }
    }
}
