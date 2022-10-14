@extends('layouts.app')

@section('title')
    | Log Surat Masuk
@endsection

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Log Surat Masuk - Daftar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Log Surat Masuk</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10">No</th>
                  <th width="60">Tanggal Surat</th>
                  <th>Nomor Surat</th>
                  <th>Hal</th>
                  <th>Asal Surat</th>
                  <th>Tingkat Urgensi</th>
                  <th width="10">Status</th>
                  <th width="10">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($suratmasuk as $item)
                <tr>
                  <td>{{ $logsuratmasuk++ }}</td>
                  <td>{{ date('j M Y', strtotime($item->tgl_surat)) }}</td>
                  <td>{{ $item->no_surat }}</td>
                  <td>{{ $item->perihal }}</td>
                  <td>{{ $item->nama_instansi }}</td>
                  <td>{{ $item->tingkat_urgen }}</td>
                  <td align="center">
                    @if( $item->id_status == 1 )
                      <span class="badge bg-success">Konsep</span>
                    @elseif( $item->id_status == 2 )
                      <span class="badge bg-green">Terkirim</span>
                    @elseif( $item->id_status == 3 )
                      <span class="badge bg-warning">Belum Dibaca</span>
                    @elseif( $item->id_status == 4 )
                      <span class="badge bg-success">Sudah Dibaca</span>
                    @elseif( $item->id_status == 5 )
                      <span class="badge bg-warning">Disposisi</span>
                    @elseif( $item->id_status == 6 )
                      <span class="badge bg-warning">Tindak Lanjut</span>
                    @elseif( $item->id_status == 7 )
                      <span class="badge bg-success">Selesai</span>
                    @elseif( $item->id_status == 8 )
                      <span class="badge bg-warning">Belum Verifikasi</span>
                    @elseif( $item->id_status == 9 )
                      <span class="badge bg-success">Sudah Verifikasi</span>
                    @elseif( $item->id_status == 10 )
                      <span class="badge bg-warning">Belum Tandatangan</span>
                    @elseif( $item->id_status == 11 )
                      <span class="badge bg-success">Sudah Tandatangan</span>
                    @endif
                  </td>
                  <td align="center">
                    <a href="{{ url('log-surat-masuk/'.$item->id) }}" style="color:blue">
                      <button type="button" class="btn btn-xs btn-outline-primary btn-block">
                        <i class="fa fa-info-circle"></i>
                      </button>
                    </a>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection

@section('script')
    <!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection