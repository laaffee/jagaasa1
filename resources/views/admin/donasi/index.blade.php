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


        <div class="section-body">

          <div class="card">
              <div class="card-header">
                  <h4> {{ $title }}</h4>
              </div>

              <div class="card-body">
                  
                  
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Proses</button></button>
                    </li>
                    
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Diterima(10)</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Ditolak(5)</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                          
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tabelDonatur">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">No.</th>
                                <th scope="col">Nama Donasi</th>
                                <th scope="col">Bantuan</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Donatur</th>   
                                <th scope="col" style="width: 15%;text-align: center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $no => $dns)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no }}.</th>
                                    <td>{{ $dns->nama }}</td>
                                    <td>{{ $dns->bantuan }}</td>
                                    <td>{{ $dns->jumlah }}</td>
                                    <td>{{ $dns->donatur }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.donatur.edit', $dns->id) }}" class="btn btn-sm btn-primary">
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
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
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