@extends('layouts.app')

@section('title')
{{ $title }} | Admin Website {{ $website }}
@stop

@section('head-style')
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="{{ asset('assets/modules/password-strength/password-strength.css') }}"/>
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
                        <a href="{{ route('admin.user.index') }}">User</a>
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
                            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary mb-3"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        
                        <span style="color:red;font-weight:bold"> * </span><i>Wajib Diisi</i>
                        <hr>

                        <form action="{{ route('admin.user.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama User</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                    placeholder="Masukkan Nama User"
                                    class="form-control @error('name') is-invalid @enderror">

                                @error('name')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Email</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                    placeholder="Masukkan Email" class="form-control @error('email') is-invalid @enderror">

                                @error('email')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                                <label>Username</label><span style="color:red;font-weight:bold"> * </span>
                                <input type="text" name="username" value="{{ old('username', $user->username) }}"
                                    placeholder="Masukkan Username" class="form-control @error('username') is-invalid @enderror">

                                @error('username')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> --}}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                            <span style="color:red;font-weight:bold; font-size: 75%;"> 
                                            * [Password harus berupa 8 karakter dengan kombinasi huruf besar, huruf kecil, angka, dan simbol.]
                                            </span>
                                        <div class="input-group">
                                            <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder=""
                                                class="form-control @error('password') is-invalid @enderror">
                                            <i class='bx bxs-show show-pass'></i>
                                        </div>

                                        <div class="strength"></div>

                                        @error('password')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Konfirmasi Password</label><span style="color:red;font-weight:bold"> * </span>
                                        <input type="password" name="password_confirmation"
                                            value="{{ old('password_confirmation') }}"
                                            placeholder="Masukkan Konfirmasi Password" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Level/Role</label><span style="color:red;font-weight:bold"> * </span>
                                <select class="form-control select-category @error('role_id') is-invalid @enderror" name="role_id" {{ $user->id == '1' ? 'disabled' : '' }}>
                                    <option value="">-- Pilih Level/Role --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ||  $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            @if($user->id == '1')
                                <input type="hidden" name="role_id" value="1"/>
                            @endif

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> Update</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
@section('foot-script')
<script src="{{ asset('assets/modules/password-strength/password-strength.js') }}"></script>
@stop

@stop