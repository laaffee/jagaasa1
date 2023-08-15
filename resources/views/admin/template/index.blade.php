@extends('layouts.app')

@section('title')
{{ $title }} | Admin Website {{ $website }}
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
                        <a href="{{ route('admin.template.edit', $template->id) }}" class="btn btn-primary mb-3" title="Tambah Data"><i class="fa fa-pencil-alt"></i> Ubah {{ $title }}</a>
                    </div>
                
                        <div class="row">

                            <div class="col-md-6">

                                <span style="font-weight:bold">LAYOUT</span>

                                <div class="form-group">
                                    <label>Layout</label>
                                    <input data-jscolor="{}" value="#3399FF" name="warna" class="form-control" disabled>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <span style="font-weight:bold">WARNA (HALAMAN ADMIN/BACKEND)</span>

                                <div class="form-group">
                                    <label>Warna Border Atas Login</label>
                                    <input data-jscolor="{}" value="#555" name="warna" class="form-control" disabled>

                                </div>

                                <div class="form-group">
                                    <label>Warna Tombol Login</label>
                                    <input data-jscolor="{}" value="#cdd3d8" name="warna" class="form-control" disabled>

                                </div>

                                <div class="form-group">
                                    <label>Warna Navbar/Active Sidebar</label>
                                    <input data-jscolor="{}" value="#de9760" name="warna" class="form-control" disabled>

                                </div>

                                <span style="font-weight:bold">WARNA (HALAMAN PUBLIC/FRONTEND)</span>

                                <div class="form-group">
                                    <label>Warna Navbar</label>
                                    <input data-jscolor="{}" value="#3399FF" name="warna" class="form-control" disabled>

                                </div>

                                <div class="form-group">
                                    <label>Warna Widget</label>
                                    <input data-jscolor="{}" value="#3399FF" name="warna" class="form-control" disabled>

                                </div>

                            </div>
                        
                        </div>
                </div>
            </div>
        </div>

    </section>
</div>

@stop