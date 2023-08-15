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
                        <a href="{{ route('admin.slider.index') }}">Slider</a>
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
                            <a href="{{ route('admin.slider.index') }}" class="btn btn-secondary mb-3"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>

                        <span style="color:red;font-weight:bold"> * </span><i>Wajib Diisi</i>
                        <hr>
                        
                        <form action="{{ route('admin.slider.update', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Judul Slider</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="text" name="judul" value="{{ old('judul', $data->judul) }}"
                                    placeholder="Masukkan Judul Berita"
                                    class="form-control @error('judul') is-invalid @enderror">

                                @error('judul')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tanggal Publish</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="date" name="tgl_publish" class="form-control @error('tgl_publish') is-invalid @enderror" value="{{ old('tgl_publish', $data->tgl_publish) }}">

                                @error('tgl_publish')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Gambar</label><span style="color:red;font-weight:bold"> * </span>(Max File : 1 MB | Format File : jpg/jpeg/png)
                                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                            </div>


                            <div class="form-group">
                                <img src="{{ $data->gambar }}" width="150px">
                            </div>

                            <div class="form-group">
                                <label>Status Publish</label><span style="color:red;font-weight:bold"> * </span>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $data->status == '1' ? 'selected' : '' }}>Publish</option>
                                    <option value="0" {{ $data->status == '0' ? 'selected' : '' }}>Tidak Publish</option>
                                </select>
                            </div>

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