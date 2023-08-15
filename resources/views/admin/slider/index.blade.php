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
                        <a href="{{ route('admin.slider.create') }}" class="btn btn-primary mb-3" title="Tambah Data"><i class="fa fa-plus"></i> Tambah {{ $title }}</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="tabelSlide">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;width: 6%">No.</th>
                                    <th scope="col">Judul Berita</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Tanggal Publish</th>
                                    <th scope="col">Status Publish</th>
                                    <th scope="col" style="width: 15%;text-align: center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($sliders as $no => $slide)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no }}.</th>
                                    <td>{{ $slide->judul }}</td>
                                    <td><img src="{{ $slide->gambar }}" style="width: 150px"></td>
                                    <td>{{ Carbon\Carbon::parse($slide->tgl_publish)->isoFormat('dddd, D MMMM Y') }}</td>
                                    <td>{{ $slide->status == 1 ? 'Publish' : 'Tidak Publish' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.slider.edit', $slide->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $slide->id }}">
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
        $('#tabelSlide').DataTable({
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
    function Delete(id){
        var id = id;
        var token = $("meta[name='csrf-token']").attr("content");

        swal({
            title: "APAKAH KAMU YAKIN ?",
            text: "INGIN MENGHAPUS DATA INI!",
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
                    url: "/admin/slider/"+id,
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