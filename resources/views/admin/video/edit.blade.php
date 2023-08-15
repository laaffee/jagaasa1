@extends('layouts.app')

@section('title')
{{ $title }} | Admin Website {{ $website }}
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
            {{-- <div>
                <img src="{{ asset('storage/setdakbr.png') }}" width="300px" class="ml-3">
            </div> --}}
    
            <div>
                <!-- Start Breadcrumb -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Beranda</li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.video.index') }}">Video</a>
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
                            <a href="{{ route('admin.video.index') }}" class="btn btn-secondary mb-3"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>

                        <span style="color:red;font-weight:bold"> * </span><i>Wajib Diisi</i>
                        <hr>

                        <form action="{{ route('admin.video.update', $video->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Judul Video</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="text" name="title" value="{{ old('title', $video->title) }}" placeholder="Masukkan Judul Video" class="form-control @error('title') is-invalid @enderror">

                                @error('title')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Embed YouTube</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="text" name="embed" value="{{ old('embed', $video->embed) }}" placeholder="Masukkan Embed YouTube" class="form-control @error('embed') is-invalid @enderror">

                                @error('embed')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                                <span style="color: red; font-weight: bold;"><i>* Cara Memasukkan Embed</i></span><br/>
                                <img src="http://localhost:3000/storage/embed.jpg" style="max-width: 100%; height: auto;"/>
                            </div>

                            <div class="form-group">
                                <label>Tanggal</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="date" name="tgl_video" value="{{ old('tgl_video', $video->tgl_video) }}" placeholder="Masukkan Tanggal" class="form-control @error('tgl_video') is-invalid @enderror">

                                @error('tgl_video')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="text" name="keterangan" value="{{ old('keterangan', $video->keterangan) }}" placeholder="Masukkan Keterangan Video" class="form-control @error('keterangan') is-invalid @enderror">

                                @error('keterangan')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
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