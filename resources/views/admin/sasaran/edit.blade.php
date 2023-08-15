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
                        
                        <form action="{{ route('admin.donatur.update', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama Donatur</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="text" name="nama" value="{{ old('nama', $data->nama) }}"
                                    placeholder="Masukkan Nama Donatur"
                                    class="form-control @error('nama') is-invalid @enderror">


                                @error('nama')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jenis</label><span style="color:red;font-weight:bold"> * </span>
                                <select class="form-control select-category @error('jenis') is-invalid @enderror" name="jenis">
                                    <option value="">-- Pilih Kategori --</option>
                                        <option value="1" {{ $data->jenis == 1 ? "selected" : "" }}>Individu</option>
                                        <option value="2" {{ $data->jenis == 2 ? "selected" : "" }}>Organisasi/Instansi</option>
                                </select>
                                @error('jenis')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Alamat Donatur</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="text" name="alamat" value="{{ old('alamat', $data->alamat) }}"
                                    placeholder="Masukkan Alamat Donatur"
                                    class="form-control @error('alamat') is-invalid @enderror">


                                @error('alamat')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Telepon</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="text" name="telp" value="{{ old('telp', $data->telp) }}"
                                    placeholder="Masukkan Telepon"
                                    class="form-control @error('telp') is-invalid @enderror">


                                @error('telp')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            

                            {{-- <div class="form-group">
                                <label>Tanggal</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="date" name="tgl" class="form-control @error('tgl') is-invalid @enderror" value="{{ old('judul', $data->tgl) }}">

                                @error('tgl')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> --}}

                            {{-- <div class="form-group">
                                <label>Gambar<span style="color:red;font-weight:bold"> * </span>(Max File : 1 MB | Format File : jpg/jpeg/png)</label>
                                <input type="file" name="foto" accept="image/jpg, image/jpeg, image/png" class="form-control @error('foto') is-invalid @enderror">
                            </div> --}}

                            {{-- <div class="form-group">
                                <img src="{{ $data->foto }}" width="150px">
                                <!-- <img src="{{$data->foto }}" width="150px"> -->
                                <!-- <label>GAMBAR</label> -->
                            </div> --}}
                            
                            {{-- <div class="form-group">
                                <label class="font-weight-bold">Tags</label>
                                <select class="form-control" name="tags[]"
                                    multiple="multiple">
                                    @foreach ($tags as $tag)
                                        <option value="{{$tag->id}}" {{ in_array($tag->id, $data->tags()->pluck('id')->toArray()) ? 'selected' : '' }}> {{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> Update</button>
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