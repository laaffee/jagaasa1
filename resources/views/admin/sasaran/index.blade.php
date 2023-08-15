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
                        <a href="{{ route('admin.donasi.create') }}" class="btn btn-primary mb-3" title="Tambah Data"><i class="fa fa-plus"></i> Tambah {{ $title }}</a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tabelBerita">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">No.</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Batas Tanggal</th>
                                <th scope="col">Status</th>
                                <th scope="col">Bantuan</th>
                                <th scope="col" style="width: 15%;text-align: center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $no => $dns)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no }}.</th>
                                    <td>{{ $dns->nama }}</td>
                                    <td>{{ $dns->namadonasi }}</td>
                                    <td>{{ Carbon\Carbon::parse($dns->tanggal)->isoFormat('dddd, D MMMM Y') }}</td>
                                    <td>
                                        @if(Carbon\Carbon::now() < $dns->tanggal)
                                            <span class="badge badge-success">Open</span>
                                        @else
                                            <span class="badge badge-danger">Close</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.bantuan.donasi', $dns->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-box"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        @if($dns->stunting_id != 0)
                                        <a href="{{ route('admin.donasi.edit', $dns->id) }}" class="btn btn-sm btn-info">
                                            <i class="fa fa-child"></i>
                                        </a>
                                        @endif
                                        <a href="{{ route('admin.donasi.edit', $dns->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $dns->id }}">
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
                title: "APAKAH KAMU YAKIN?",
                text: "INGIN MENGHAPUS DATA DONASI INI!",
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
                        url: "/admin/donasi/"+id,
                        data:     {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA DONASI BERHASIL DIHAPUS!',
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
                                    text: 'DATA DONASI GAGAL DIHAPUS!',
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