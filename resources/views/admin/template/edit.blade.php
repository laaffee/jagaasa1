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
            <div>
                <!-- Start Breadcrumb -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Beranda</li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.template.index') }}">Template</a>
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
                            <a href="{{ route('admin.template.index') }}" class="btn btn-secondary mb-3"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        
                        <span style="color:red;font-weight:bold"> * </span><i>Wajib Diisi</i>
                        <hr>

                        <form action="{{ route('admin.template.update', $template->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="col-md-6">
    
                                    <span style="font-weight:bold">LAYOUT</span>
    
                                    <div class="form-group">
                                        <label>Layout</label>
                                        <input data-jscolor="{}" value="#3399FF" name="warna" class="form-control">
                                    </div>
    
                                </div>
                                <div class="col-md-6">
    
                                    <span style="font-weight:bold">WARNA (HALAMAN ADMIN/BACKEND)</span>
    
                                    <div class="form-group">
                                        <label>Warna Border Atas Login</label>
                                        <input data-jscolor="{}" value="#555" name="warna" class="form-control">
    
                                    </div>
    
                                    <div class="form-group">
                                        <label>Warna Tombol Login</label>
                                        <input data-jscolor="{}" value="#cdd3d8" name="warna" class="form-control">
    
                                    </div>
    
                                    <div class="form-group">
                                        <label>Warna Navbar/Active Sidebar</label>
                                        <input data-jscolor="{}" value="#de9760" name="warna" class="form-control">
    
                                    </div>
    
                                    <span style="font-weight:bold">WARNA (HALAMAN PUBLIC/FRONTEND)</span>
    
                                    <div class="form-group">
                                        <label>Warna Navbar</label>
                                        <input data-jscolor="{}" value="#3399FF" name="warna" class="form-control">
    
                                    </div>
    
                                    <div class="form-group">
                                        <label>Warna Widget</label>
                                        <input data-jscolor="{}" value="#3399FF" name="warna" class="form-control">
    
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