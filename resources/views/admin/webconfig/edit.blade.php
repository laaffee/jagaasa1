@extends('layouts.app')

@section('title')
Admin Website {{ $website }} | {{ $title }}
@stop

@section('head-style')
<style>
    .select2-container {
        display: block;
    }
</style>
@stop

@section('content')
    <div class="main-content">
        <section class="section mt-4">
            <div>
                <!-- Start Breadcrumb -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Beranda</li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.webconfig.index') }}">Web Config</a>
                    </li>
                    <li class="breadcrumb-item active" style="font-weight: bold">{{ $title }}</li>
                </ol>
                <!-- End Breadcrumb -->
            </div>
    
            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4>Form {{ $title }}</h4>
                    </div>

                    <div class="card-body">
                        
                        <div>
                            <a href="{{ route('admin.webconfig.index') }}" class="btn btn-secondary mb-3"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        
                        <span style="color:red;font-weight:bold"> * </span><i>Wajib Diisi</i>
                        <hr>

                        <form action="{{ route('admin.webconfig.update', $webconfig->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="col-md-6">

                                    <span style="font-weight:bold">PROFIL WEBSITE</span>

                                    <div class="form-group">
                                        <label>Nama Website</label><span style="color:red;font-weight:bold"> * </span>
                                        <input type="text" name="nama_web" value="{{ old('nama_web', $webconfig->nama_web) }}"
                                            placeholder="Masukkan Nama Website"
                                            class="form-control @error('nama_web') is-invalid @enderror">

                                        @error('nama_web')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>URL Website Publik</label>
                                        <input type="text" name="url_publik" value="{{ old('url_publik',$webconfig->url_publik) }}"
                                            class="form-control @error('url_publik') is-invalid @enderror">

                                        @error('url_publik')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
    
                                    <div class="form-group">
                                        <label>URL Website Admin</label><span style="color:red;font-weight:bold"> * </span>
                                        <input type="text" name="url_admin" value="{{ $webconfig->url_admin }}"
                                            class="form-control @error('url_admin') is-invalid @enderror">

                                        @error('url_admin')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Deskripsi</label><span style="color:red;font-weight:bold"> * </span>
                                        <textarea class="form-control content @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                                placeholder="Masukkan Deskripsi"
                                                rows="10" style="height: 125px">{!! old('deskripsi', $webconfig->deskripsi) !!}</textarea>

                                        @error('deskripsi')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <span style="font-weight:bold">KONTAK KAMI</span>

                                    <div class="form-group">
                                        <label>Alamat Kantor</label><span style="color:red;font-weight:bold"> * </span>
                                        <textarea class="form-control content @error('alamat') is-invalid @enderror" name="alamat"
                                                placeholder="Masukkan Alamat Kantor"
                                                rows="10" style="height: 75px">{!! old('alamat', $webconfig->alamat) !!}</textarea>

                                        @error('alamat')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label><span style="color:red;font-weight:bold"> * </span>
                                        <input type="email" name="email" value="{{ old('email', $webconfig->email) }}"
                                            placeholder="Masukkan Email" class="form-control @error('email') is-invalid @enderror">
    
                                        @error('email')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="text" name="telp" value="{{ old('telp', $webconfig->telp) }}"
                                            placeholder="Masukkan Nomor Telepon" class="form-control @error('telp') is-invalid @enderror">
    
                                        @error('telp')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Faksimile/Fax</label>
                                        <input type="text" name="fax" value="{{ old('fax', $webconfig->fax) }}"
                                            placeholder="Masukkan Faksimile/Fax" class="form-control @error('fax') is-invalid @enderror">
    
                                        @error('fax')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <span style="font-weight:bold">SOSIAL MEDIA</span>

                                    <div class="form-group">
                                        <label>Facebook</label><br/>
                                        <label>Nama Akun (Facebook)</label>
                                        <input type="text" name="fb" value="{{ old('fb', $webconfig->fb) }}"
                                            placeholder="Tanpa @ Misal : OpdKotaBogor" class="form-control @error('fb') is-invalid @enderror">
    
                                        @error('fb')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>URL (Facebook)</label> Misal : https://facebook.com/urlakun
                                        <input type="text" name="url_fb" value="{{ $webconfig->url_fb }}"
                                            class="form-control @error('url_fb') is-invalid @enderror">

                                        @error('url_fb')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Instagram</label><br/>
                                        <label>Nama Akun (Instagram)</label>
                                        <input type="text" name="ig" value="{{ old('ig', $webconfig->ig) }}"
                                            placeholder="Tanpa @ Misal : opdkotabogor" class="form-control @error('ig') is-invalid @enderror">
    
                                        @error('ig')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>URL (Instagram)</label> Misal : https://instagram.com/urlakun
                                        <input type="text" name="url_ig" value="{{ $webconfig->url_ig }}"
                                            class="form-control @error('url_ig') is-invalid @enderror">

                                        @error('url_ig')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Twitter</label><br/>
                                        <label>Nama Akun (Twitter)</label>
                                        <input type="text" name="twitter" value="{{ old('twitter', $webconfig->twitter) }}"
                                            placeholder="Tanpa @ Misal : opdkotabogor" class="form-control @error('twitter') is-invalid @enderror">
    
                                        @error('twitter')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>URL (Twitter)</label> Misal : https://twitter.com/urlakun
                                        <input type="text" name="url_twitter" value="{{ $webconfig->url_twitter }}"
                                            class="form-control @error('url_twitter') is-invalid @enderror">

                                        @error('url_twitter')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Youtube</label><br/>
                                        <label>Nama Akun (Youtube)</label>
                                        <input type="text" name="youtube" value="{{ old('youtube', $webconfig->youtube) }}"
                                            placeholder="Tanpa @ Misal : OpdKotaBogor" class="form-control @error('youtube') is-invalid @enderror">
    
                                        @error('youtube')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>URL (Youtube)</label> Misal : https://youtube.com/urlakun
                                        <input type="text" name="url_youtube" value="{{ $webconfig->url_youtube }}"
                                            class="form-control @error('url_youtube') is-invalid @enderror">

                                        @error('url_youtube')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                </div>
                            
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> Update</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
