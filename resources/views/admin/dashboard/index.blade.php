@extends('layouts.app')

@section('title')
{{ $title }} | Admin Website Jaga Asa 
@stop

@section('content')
<div class="main-content">
    <section class="section mt-4">
        {{-- <div>
            <img src="{{ asset('storage/logokbr.png') }}" width="75px" class="ml-3">
        </div> --}}

        <div>
            <!-- Start Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" style="font-weight: bold">{{ $title }}</li>
            </ol>
            <!-- End Breadcrumb -->
        </div>


        <div class="row ">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fa fa-book-open text-white fa-2x"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fa fa-bell text-white fa-2x"></i>
                </div>
              </div>
            </div>
            {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fa fa-tags text-white fa-2x"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>DOKUMEN</h4>
                  </div>
                  <div class="card-body">
                    {{ App\Models\Dokumen::count() ?? '0' }}
                  </div>
                </div>
              </div>
            </div> --}}
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fa fa-users text-white fa-2x"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>DONATUR</h4>
                  </div>
                  <div class="card-body">
                    {{-- {{ App\Models\Donatur::count() ?? '0' }} --}}
                  </div>
                </div>
              </div>
            </div>                  
          </div>

          {{-- <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4> Log Aktivitas</h4>
                </div>

                <div class="card-body">

                    @if(Auth::user()->id == '1')
                    <div>
                        <a onClick="Delete()" class="btn btn-danger mb-3 text-white" title="Bersihkan Log Aktivitas"><i class="fa fa-trash"></i> Bersihkan Log Aktivitas</a>
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered" id="tabelLog">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;width: 6%">No.</th>
                                    <th scope="col" class="text-center">Waktu</th>
                                    <th scope="col" style="width: 50%" class="text-center">Aktivitas</th>
                                    <th scope="col" style="width: 15%;text-align: center">User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $no => $row)
                                    <tr class="text-center">
                                        <th scope="row" style="text-align: center">
                                            {{ ++$no }}.</th>
                                        <td>{{ $row->created_at }}</td>
                                        <td>{!! $row->aktivitas !!}</td>
                                        <td>{{ $row->user->username }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}

    </section>
</div>
@section('foot-script')
<script>
    $(document).ready( function () {
        $('#tabelLog').DataTable({
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
  function Delete()
      {
          swal({
              title: "Apakah Kamu Yakin?",
              text: "Ingin Menghapus Semua Data Log Aktivitas Ini",
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
                      url: "/admin/logactivity/clear",
                      type: 'GET',
                      success: function (response) {
                          if (response.status == "success") {
                              swal({
                                  title: 'BERHASIL!',
                                  text: 'Data Log Aktivitas Berhasil Dihapus!',
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
                                  text: 'Data Log Aktivitas Gagal Dihapus!',
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