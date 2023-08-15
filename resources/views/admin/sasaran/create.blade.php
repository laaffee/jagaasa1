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
                        <a href="{{ route('admin.donatur.index') }}">Donasi</a>
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
                            <a href="{{ route('admin.donasi.index') }}" class="btn btn-secondary mb-3"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        
                        <span style="color:red;font-weight:bold"> * </span><i>Wajib Diisi</i>
                        <hr>

                        <form action="{{ route('admin.donasi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Kategori</label><span style="color:red;font-weight:bold"> * </span>
                                <select class="form-control select-category @error('kategori_id') is-invalid @enderror" name="kategori_id">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                                            {{ $k->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                                <label>Nama Anak</label><span style="color:red;font-weight:bold"> * </span>
                                <select class="form-control select-category @error('stunting_id') is-invalid @enderror" name="stunting_id">
                                    <option value="">-- Pilih Nama Anak --</option>
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->id }}" {{ old('stunting_id') == $k->id ? 'selected' : '' }}>
                                            {{ $k->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> --}}

                            <div class="form-group">
                                <label>Nama Donasi</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Donasi" class="form-control @error('nama') is-invalid @enderror">

                                @error('nama')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Sampai Tanggal (Batas Waktu Akhir Donasi)</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="form-control @error('tanggal') is-invalid @enderror">

                                @error('tanggal')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label><span style="color:red;font-weight:bold"> * </span>
                                <textarea class="form-control content @error('deskripsi') is-invalid @enderror" name="deskripsi" placeholder="Masukkan Deskripsi" rows="10">{!! old('deskripsi') !!}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Foto (Max File : 1 MB | Format File : jpg/jpeg/png)</label>
                                <input type="file" name="foto" accept="image/jpg, image/jpeg, image/png" class="form-control @error('foto') is-invalid @enderror">

                                @error('foto')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit">
                                <i class="fa fa-paper-plane"></i> Simpan
                            </button>
                            
                            <button class="btn btn-warning btn-reset" type="reset">
                                <i class="fa fa-redo"></i> Reset
                            </button>

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