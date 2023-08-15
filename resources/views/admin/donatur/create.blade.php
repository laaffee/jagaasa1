@extends('layouts.app')

@section('title')
{{ $title }} | Admin Website Jaga Asa
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
                        <a href="{{ route('admin.donatur.index') }}">Donatur</a>
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
                            <a href="{{ route('admin.donatur.index') }}" class="btn btn-secondary mb-3"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        
                        <span style="color:red;font-weight:bold"> * </span><i>Wajib Diisi</i>
                        <hr>

                        <form action="{{ route('admin.donatur.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Nama Donatur</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Donatur" class="form-control @error('name') is-invalid @enderror">

                                @error('name')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jenis Donatur</label><span style="color:red;font-weight:bold"> * </span>
                                <select class="form-control select-category @error('jenis') is-invalid @enderror" name="jenis">
                                    <option value="">-- Pilih Kategori --</option>
                                        <option value="1">Individu</option>
                                        <option value="2">Organisasi/Instansi</option>
                                </select>

                                @error('jenis')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Alamat Donatur</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="text" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Alamat Donatur" class="form-control @error('alamat') is-invalid @enderror">

                                @error('alamat')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Narahubung/Contact Person</label>
                                <input type="text" name="narahubung" value="{{ old('narahubung') }}" placeholder="Masukkan Narahubung" class="form-control @error('narahubung') is-invalid @enderror">

                                @error('narahubung')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>Telepon</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="text" name="telp" value="{{ old('telp') }}" placeholder="Masukkan Telepon" class="form-control @error('telp') is-invalid @enderror">

                                @error('telp')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                                {{-- <div class="form-group">
                                    <label>Konten</label><span style="color:red;font-weight:bold"> * </span>
                                    <a href="#" data-toggle="tooltip" class="btn"
                                        title="Agar Output Gambar Konten Optimal, Harap Inputkan Lebar (Width) dan Tinggi (Height) dengan Menggunakan % (Simbol Persen) pada Gambar Konten yang Ditambahkan | Misal : 100%, 75%, 50%">
                                        <i class="fas fa-info-circle"></i> Cek Informasi
                                    </a>
                                    <textarea class="form-control content @error('isi') is-invalid @enderror" name="isi" placeholder="Masukkan Konten / Isi Berita" rows="10">{!! old('isi') !!}</textarea>
                                    @error('isi')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            <div class="form-group">
                                <label>Tanggal</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="date" name="tgl" value="{{ old('tgl') }}" class="form-control @error('tgl') is-invalid @enderror">

                                @error('tgl')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Gambar<span style="color:red;font-weight:bold"> * </span>(Max File : 1 MB | Format File : jpg/jpeg/png)</label>
                                <input type="file" name="foto" accept="image/jpg, image/jpeg, image/png" class="form-control @error('foto') is-invalid @enderror">

                                @error('foto')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> --}}

                            {{-- <div class="form-group">
                                <label class="font-weight-bold">Tags</label>
                                <select class="form-control" name="tags[]" multiple="multiple">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }} </option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> Simpan</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>
    <script>
        var editor_config = {
            selector: "textarea.content",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
        };

        tinymce.init(editor_config);
    </script>
@stop