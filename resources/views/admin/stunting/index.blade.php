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
                    <h4>{{ $title }} (Belum Terverifikasi)</h4>

                </div>

                <div class="card-body">

                    <form id="myform" action="{{ route('admin.stunting.verifikasi') }}" method="post" enctype="multipart/form-data">
                    
                    {{ csrf_field() }}

                    <button class="save btn btn-warning" type="submit" value="Simpan">
                        <i class="fa fa-paper-plane"></i> Verifikasi Data
                    </button><br><br>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tabelStunting">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">No.</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Tempat, Tanggal Lahir</th>
                                <th scope="col" style="width: 15%;text-align: center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $no => $s)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no }}.</th>
                                    <td>{{ $s['bayi']['nik'] }}</td>
                                    <td>{{ $s['bayi']['nama'] }}</td>
                                    <td>{{ $s['bayi']['jk'] }}</td>
                                    <td>
                                        {{ $s['bayi']['tempat_lahir'] }},
                                        {{ Carbon\Carbon::parse($s['bayi']['tanggal_lahir'])->isoFormat('D MMMM Y') }}
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="check[]" value="{{ $s['bayi']['nik'] }}" {{ Auth::user()->role_id != 1 ? 'disabled' : '' }}>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4>{{ $title }} (Terverifikasi)</h4>

                </div>

                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tabelVerifikasi">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">No.</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Tempat, Tanggal Lahir</th>
                                <th scope="col" style="width: 15%;text-align: center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($verify as $no => $s)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no }}.</th>
                                    <td>{{ $s['nik'] }}</td>
                                    <td>{{ $s['nama'] }}</td>
                                    <td>{{ $s['jk'] }}</td>
                                    <td>
                                        {{ $s['tempat_lahir'] }},
                                        {{ Carbon\Carbon::parse($s['tanggal_lahir'])->isoFormat('D MMMM Y') }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.stunting.cetak', $s['nik']) }}" title="Cetak QR Code" target="_blank" class="btn btn-sm btn-danger">
                                            <i class="fa fa-qrcode"> QR CODE</i>
                                        </a>
                                        {{--
                                        <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $dns->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        --}}
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    </form>
                </div>
            </div>
        </div>

    </section>
</div>
@section('foot-script')
<script>
    $(document).ready( function () {
        $('#tabelStunting').DataTable({
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
    $(document).ready( function () {
        $('#tabelVerifikasi').DataTable({
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
