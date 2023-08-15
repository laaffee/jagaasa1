@extends('layouts.app')

@section('title')
Admin Website {{ $website }} | {{ $title }}
@stop

@section('content')
<div class="main-content">
    <section class="section mt-4">
        {{-- <div>
            <img src="{{ asset('storage/setdakbr.png') }}" width="300px" class="ml-3">
        </div> --}}

        <div>
            <!-- Start Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Beranda</li>
                <li class="breadcrumb-item active" style="font-weight: bold">{{ $title }}</li>
            </ol>
            <!-- End Breadcrumb -->
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4> {{ $title }}</h4>
                </div>

                <div class="card-body">

                    <div>
                        <a href="{{ route('admin.webconfig.edit', $webconfig->id) }}" class="btn btn-primary mb-3" title="Tambah Data"><i class="fa fa-pencil-alt"></i> Ubah {{ $title }}</a>
                    </div>
                
                        <div class="row">

                            <div class="col-md-6">

                                <span style="font-weight:bold">PROFIL WEBSITE</span>

                                <div class="form-group">
                                    <label>Nama Website</label>
                                    <input type="text" name="nama_web" value="{{ $webconfig->nama_web }}"
                                        class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>URL Website Publik</label>
                                    <input type="text" name="url_publik" value="{{ $webconfig->url_publik }}"
                                        class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>URL Website Admin</label>
                                    <input type="text" name="url_admin" value="{{ $webconfig->url_admin }}"
                                        class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control content" name="deskripsi"
                                            rows="10" style="height: 125px" disabled>{!! $webconfig->deskripsi !!}</textarea>
                                </div>

                                <span style="font-weight:bold">KONTAK KAMI</span>

                                <div class="form-group">
                                    <label>Alamat Kantor</label>
                                    <textarea class="form-control content" name="alamat"
                                            rows="10" style="height: 75px" disabled>{!! $webconfig->alamat !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ $webconfig->email }}"
                                        class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="text" name="telp" value="{{ $webconfig->telp }}"
                                        class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Faksimile/Fax</label>
                                    <input type="text" name="fax" value="{{ $webconfig->fax }}"
                                        class="form-control" disabled>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <span style="font-weight:bold">SOSIAL MEDIA</span>

                                <div class="form-group">
                                    <label>Facebook</label><br/>
                                    <label>Nama Akun (Facebook)</label>
                                    <input type="text" name="fb" value="{{ $webconfig->fb }}"
                                        class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>URL (Facebook)</label>
                                    <input type="text" name="url_fb" value="{{ $webconfig->url_fb }}"
                                        class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Instagram</label><br/>
                                    <label>Nama Akun (Instagram)</label>
                                    <input type="text" name="ig" value="{{ $webconfig->ig }}"
                                        class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>URL (Instagram)</label>
                                    <input type="text" name="url_ig" value="{{ $webconfig->url_ig }}"
                                        class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Twitter</label><br/>
                                    <label>Nama Akun (Twitter)</label>
                                    <input type="text" name="twitter" value="{{ $webconfig->twitter }}"
                                        class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>URL (Twitter)</label>
                                    <input type="text" name="url_twitter" value="{{ $webconfig->url_twitter }}"
                                        class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Youtube</label><br/>
                                    <label>Nama Akun (Youtube)</label>
                                    <input type="text" name="youtube" value="{{ $webconfig->youtube }}"
                                        class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label>URL (Youtube)</label>
                                    <input type="text" name="url_youtube" value="{{ $webconfig->url_youtube }}"
                                        class="form-control" disabled>
                                </div>

                            </div>
                        
                        </div>
                </div>
            </div>
        </div>

    </section>
</div>

@stop
