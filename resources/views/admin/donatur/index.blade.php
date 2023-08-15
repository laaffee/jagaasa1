@extends('layouts.app')

@section('title')
{{ $title }} | Admin Website Jaga Asa
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
                        <a href="{{ route('admin.donatur.create') }}" class="btn btn-primary mb-3" title="Tambah Data"><i class="fa fa-plus"></i> Tambah {{ $title }}</a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tabelDonatur">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">No.</th>
                                <th scope="col">Nama Donatur</th>
                                <th scope="col">Jenis Donatur</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Telepon</th>   
                                <th scope="col">Narahubung/Contact Person</th> 
                                <th scope="col" style="width: 15%;text-align: center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $no => $dnt)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no }}.</th>
                                    <td>{{ $dnt->nama }}</td>
                                    <td>
                                        @if($dnt->jenis == 1)
                                            Individu
                                        @else
                                            Organisasi/Instansi
                                        @endif
                                    </td>
                                    <td>{{ $dnt->alamat }}</td>
                                    <td>{{ $dnt->telp }}</td>
                                    <td>{{ $dnt->narahubung }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.donatur.edit', $dnt->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $dnt->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@section('foot-script')
<script>
    $(document).ready( function () {
        $('#tabelBerita').DataTable({
                responsive: true,
                language: {
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Tidak ada data",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data",
                    "infoFiltered": "(difilter dari _MAX_ total data)",
                    "search": "Cari:",
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya"
                    }
                }
            });
    } );
</script>
<script>
    //ajax delete
    function Delete(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN, INGIN MENGHAPUS DATA INI?",
                text: "Menghapus Data Donatur akan menghapus Data User!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    //ajax delete
                    jQuery.ajax({
                        url: "/admin/donatur/"+id,
                        data:     {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });

                } else {
                    return true;
                }
            })
        }
</script>
@stop

@stop