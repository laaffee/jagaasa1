@extends('layouts.app')

@section('title')
{{ $title }} | Admin Website Jaga Asa
@stop

@section('content')
<div class="main-content">
    <section class="section mt-4">
        <div>
            <!-- Start Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Beranda</li>
                <li class="breadcrumb-item">Donasi</li>
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
                        <a href="{{ route('admin.bantuan.create') }}" class="btn btn-primary mb-3" title="Tambah Data"><i class="fa fa-plus"></i> Tambah {{ $title }}</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="tabelBantuan">
                            <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Jenis Bantuan</th>
                                <th class="text-center">Target</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $no => $btn)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no }}.</th>
                                    <td>@if($btn->jenisbantuan_id == 1) 
                                        Uang
                                    @else
                                        Barang
                                    @endif</td>
                                    <td>{{ $btn->target }}</td>
                                    <td>{{ $btn->satuan }}</td>
                                    <td>@if($btn->status == 0) 
                                        Belum
                                    @else
                                        Sudah
                                    @endif</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.bantuan.edit', $btn->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $btn->id }}">
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
        $('#tabelKategori').DataTable({
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
                title: "Apakah Kamu Yakin?",
                text: "Ingin Menghapus Data Kategori Ini",
                icon: "warning",
                buttons: [
                    'Tidak',
                    'Ya'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    //ajax delete
                    jQuery.ajax({
                        url: "/admin/kategori/"+id,
                        data:     {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'Data Kategori Berhasil Dihapus!',
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
                                    text: 'Data Kategori Gagal Dihapus!',
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