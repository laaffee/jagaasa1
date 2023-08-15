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
                    <li class="breadcrumb-item">Donasi</li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.bantuan.index') }}">Bantuan</a>
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
                            <a href="{{ route('admin.bantuan.index') }}" class="btn btn-secondary mb-3" title="Index Bantuan"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>

                        <span style="color:red;font-weight:bold"> * </span><i>Wajib Diisi</i>
                        <hr>

                        <form action="{{ route('admin.bantuan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Jenis Bantuan</label><span style="color:red;font-weight:bold"> * </span>
                                <select class="form-control select-category @error('kategori') is-invalid @enderror" name="kategori">
                                    <option value="">-- Pilih Kategori --</option>
                                        <option value="1">Uang</option>
                                        <option value="2">Barang</option>
                                </select>

                                @error('jenis')
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