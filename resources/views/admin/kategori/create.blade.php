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
                    <li class="breadcrumb-item">Master</li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.kategori.index') }}">Kategori</a>
                    </li>
                    <li class="breadcrumb-item active" style="font-weight: bold">{{ $title }}</li>
                </ol>
                <!-- End Breadcrumb -->
            </div>
    
            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4>{{ $title }}</h4>
                    </div>

                    <div class="card-body">
                        
                        <div>
                            <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary mb-3" title="Index Kategori"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>

                        <span style="color:red;font-weight:bold"> * </span><i>Wajib Diisi</i>
                        <hr>

                        <form action="{{ route('admin.kategori.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nama Kategori</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="text" name="nama" value="{{ old('nama') }}"
                                    placeholder="Masukkan Nama Kategori"
                                    class="form-control @error('nama') is-invalid @enderror">

                                @error('nama')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                          
                       
                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> Simpan</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop