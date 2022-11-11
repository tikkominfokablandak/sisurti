@extends('layouts.app')

@section('title')
    | Surat Masuk #{{ $suratmasuk->id }}
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
          <h1 class="m-0">Surat Masuk #{{ $suratmasuk->id }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/surat-masuk') }}">Surat Masuk</a></li>
            <li class="breadcrumb-item active">Surat Masuk #{{ $suratmasuk->id }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        @if( $suratmasuk->id_status == 1 )
            <div class="callout callout-warning">
                <h5><b>Surat belum dikirim ke Kepala OPD</b></h5>

                <p>{{ $suratmasuk->created_at }}</p>
            </div>
        @elseif( $suratmasuk->id_status == 2 )
            <div class="callout callout-success">
                <h5><b>Surat sudah dikirim ke Kepala OPD</b></h5>

                <p>{{ $suratmasuk->created_at }}</p>
            </div>
        @endif

        <div class="row">
            <div class="col-2">
                <a href="{{ URL::to('/surat-masuk') }}">
                    <button type="button" class="btn btn-block btn-default">
                        <i class="fas fa-chevron-circle-left"></i> &nbsp; Kembali
                    </button>
                </a>
            </div>
            @if( $suratmasuk->id_status == 1 )
                <div class="col-2">
                    <a href="{{ URL::to('/surat-masuk/'.$suratmasuk->id.'/edit') }}">
                        <button type="button" class="btn btn-block btn-warning">
                            Edit &nbsp; <i class="fa fa-edit"></i> 
                        </button>
                    </a>
                </div>
                <div class="col-2">
                    <form method="POST" action="{{ route('sm.kirim', [$suratmasuk->id]) }}" enctype="multipart/form-data">
                    @csrf
                        <button type="submit" class="btn btn-block btn-info">
                            Kirim &nbsp; <i class="fas fa-share"></i>
                        </button>
                    </form>
                </div>
            @else
                <div class="col-2">
                    <button type="button" class="btn btn-block btn-warning" disabled>
                        Edit &nbsp; <i class="fa fa-edit"></i> 
                    </button>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-block btn-info" disabled>
                        Kirim &nbsp; <i class="fas fa-share"></i>
                    </button>
                </div>
            @endif
        </div>

        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Surat Masuk dari :
                        </h3>
                    </div>

                    <div class="card-body">
                        <h5><b>{{ $suratmasuk->nama_pengirim }}</b> {{ $suratmasuk->jabatan_pengirim }} - {{ $suratmasuk->instansi_pengirim }}</h5>

                        <div class="row">
                            <div class="col-md-4">
                                <dl>
                                    <dt>Nomor Surat</dt>
                                    <dd>{{ $suratmasuk->no_surat }}</dd>
                                    <dt>Tanggal Surat</dt>
                                    <dd>{{ $suratmasuk->tgl_surat }}</dd>
                                </dl>
                            </div>
                            
                            <div class="col-md-8">
                                <dl>
                                    <dt>Hal</dt>
                                    <dd>{{ $suratmasuk->perihal }}</dd>
                                    <dt>Isi Ringkas</dt>
                                    <dd>{{ $suratmasuk->isi }}</dd>
                                </dl>
                            </div>
                        </div>

                        <div id="accordion">
                            <div class="card card-default">
                                <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                        <i class="nav-icon fas fa-file-alt"></i>
                                    Detail Surat
                                    </a>
                                </h4>
                                </div>
                                <div id="collapseOne" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <dl class="row">
                                                    <dt class="col-sm-3">Jenis Surat</dt>
                                                    <dd class="col-sm-9">{{ $suratmasuk->jenis_surat }}</dd>
                                                    <dt class="col-sm-3">Sifat Surat</dt>
                                                    <dd class="col-sm-9">{{ $suratmasuk->sifat_surat }}</dd>
                                                    <dt class="col-sm-3">Tingkat Urgensi</dt>
                                                    <dd class="col-sm-9">{{ $suratmasuk->tingkat_urgen }}</dd>
                                                    {{-- <dt class="col-sm-3">Klasifikasi</dt>
                                                    <dd class="col-sm-9">-</dd> --}}
                                                </dl>
                                            </div>
                                            
                                            <div class="col-md-7">
                                                <dl class="row">
                                                    <dt class="col-sm-3">Diterima pada</dt>
                                                    <dd class="col-sm-9">{{ $suratmasuk->tgl_diterima }}</dd>
                                                    <dt class="col-sm-3">Diregistrasikan pada</dt>
                                                    <dd class="col-sm-9">{{ $suratmasuk->created_at }}</dd>
                                                    <dt class="col-sm-3">Diregistrasikan oleh</dt>
                                                    <dd class="col-sm-9">{{ $suratmasuk->nama }}</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <iframe src="{{ asset('storage/'.$suratmasuk->id_create.'/suratmasuk/'.$suratmasuk->file_surat) }}" align="top" height="1000" width="100%" frameborder="0" scrolling="auto"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-default">
                  <div class="card-header">
                    <h3 class="card-title">Riwayat Tindak Lanjut</h3>
                  </div>
                  <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kepada</th>
                                    <th>Pesan Disposisi / Koordinasi</th>
                                    <th>Instruksi / Pesan Tambahan</th>
                                    <th>Tanggal Disposisi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($disposisi as $item)
                                <tr>
                                    <td>{{ $item->nama  }} - {{ $item->nama_jabatan }}</td>
                                    <td>{{ $item->disp_ket }}</td>
                                    <td>{{ $item->disp_pesan }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td align="center">
                                        @if( $item->id_status == 1 )
                                          <span class="badge bg-success">Konsep</span>
                                        @elseif( $item->id_status == 2 )
                                          <span class="badge bg-warning">Terkirim</span>
                                        @elseif( $item->id_status == 3 )
                                          <span class="badge bg-warning">Belum Dibaca</span>
                                        @elseif( $item->id_status == 4 )
                                          <span class="badge bg-success">Sudah Dibaca</span>
                                        @elseif( $item->id_status == 5 )
                                          <span class="badge bg-warning">Disposisi</span>
                                        @elseif( $item->id_status == 6 )
                                          <span class="badge bg-warning">Tindak Lanjut</span>
                                        @elseif( $item->id_status == 7 )
                                          <span class="badge bg-success">Disposisi Selesai</span>
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
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Histori Surat</h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="10">Tanggal</th>
                            <th>Pengirim</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Jenis Surat</th>
                            <th>Hal</th>
                            {{-- <th width="10">File</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($log_surat as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td><b>{{ $item->nama_pengirim }}</b></td>
                            <td>{{ $item->jabatan_pengirim }} - {{ $item->instansi_pengirim }}</td>
                            <td>
                                <b>{{ $item->nama }}</b> - {{ $item->nama_jabatan }} - {{ $item->nama_opd }}
                                {{-- @if( $item->read == "READ" )
                                    <span class="badge bg-success">SUDAH DIBACA</span>
                                @elseif( $item->read == "UNREAD" )
                                    <span class="badge bg-warning">BELUM DIBACA</span>
                                @endif --}}
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
                                <span class="badge bg-success">Disposisi Selesai</span>
                                @elseif( $item->id_status == 8 )
                                <span class="badge bg-warning">Belum Verifikasi</span>
                                @elseif( $item->id_status == 9 )
                                <span class="badge bg-success">Sudah Verifikasi</span>
                                @elseif( $item->id_status == 10 )
                                <span class="badge bg-warning">Belum Tandatangan</span>
                                @elseif( $item->id_status == 11 )
                                <span class="badge bg-success">Sudah Tandatangan</span>
                                @endif
                                <br> <br>
                                @if( $item->disp_ket == NULL)

                                @elseif( $item->disp_ket != NULL)
                                Pesan / Koordinasi / Saran : <br>
                                <i class="fas fa-check-circle" style="color: green"></i> <br>
                                {{ $item->disp_ket }} <br>
                                Instruksi / Saran / Pesan Tambahan : <br>
                                {{ $item->disp_pesan }}
                                @endif
                            </td>
                            <td>{{ $item->jenis_surat }}</td>
                            <td>
                              {{ $item->perihal }}
                            </td>
                            {{-- <td align="center">
                                <a href="{{ url('surat-masuk/unduh/'. $item->file_surat) }}">
                                    <i class="far fa-file-pdf"></i>
                                </a>
                            </td> --}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection

@section('script')
    <!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

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