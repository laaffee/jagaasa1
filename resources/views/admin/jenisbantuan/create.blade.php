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
    
            <div>
                <!-- Start Breadcrumb -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Beranda</li>
                    <li class="breadcrumb-item">Master</li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.jenisbantuan.index') }}">Jenis Bantuan</a>
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
                            <a href="{{ route('admin.jenisbantuan.index') }}" class="btn btn-secondary mb-3" title="Index Jenis Bantuan"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>

                        <span style="color:red;font-weight:bold"> * </span><i>Wajib Diisi</i>
                        <hr>

                        <form action="{{ route('admin.jenisbantuan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Jenis Bantuan</label><span style="color:red;font-weight:bold"> * </span>
                                <select class="form-control select-category @error('jenis_bantuan') is-invalid @enderror" name="jenis_bantuan">
                                    <option value="">-- Pilih Kategori --</option>
                                        <option value="Uang">Uang</option>
                                        <option value="Sembako">Sembako</option>
                                        <option value="PMT">PMT</option>
                                        <option value="Non-PMT">Non-PMT</option>
                                </select>

                                @error('jenis_bantuan')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nama Bantuan</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="text" name="nama_bantuan" value="{{ old('nama_bantuan') }}" placeholder="Masukkan Nama Bantuan" class="form-control @error('nama_bantuan') is-invalid @enderror">

                                @error('nama_bantuan')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Satuan</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="text" name="satuan" value="{{ old('satuan') }}" placeholder="Masukkan Satuan" class="form-control @error('satuan') is-invalid @enderror">

                                @error('satuan')
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