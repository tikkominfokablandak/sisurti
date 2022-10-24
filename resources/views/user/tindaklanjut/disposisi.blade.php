@extends('layouts.app')

@section('title')
    | Form Disposisi Surat Masuk #{{ $suratmasuk->id }}
@endsection

@section('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Form Disposisi Surat Masuk #{{ $suratmasuk->id }}</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title"><i class="fa fa-edit"></i>  Form Disposisi</h3>
                    </div>
                    <!-- /.card-header -->
      
                    <!-- form start -->
                    <form method="POST" action="{{ route('tl.kirim', [$suratmasuk->id]) }}" enctype="multipart/form-data">
                      @csrf
                      {{-- @method('put') --}}
                      <div class="card-body">
                          <div class="row">
                              <div class="col-sm-12">

                                <div class="form-group">
                                    <label>Tujuan Disposisi
                                        <small style="color:red"><b>*</b></small>
                                    </label>
    
                                    <select id="tujuan_disposisi" class="form-control" style="width: 100%;" name="id_disp_ke" required oninvalid="this.setCustomValidity('Mohon pilih Tujuan Disposisi dahulu!')" oninput="setCustomValidity('')">
                                      <option value=""></option>
                                      @foreach ($tujuandisposisi as $item)
                                      <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->nama_jabatan }} - {{ $item->nama_opd }}</option>
                                      @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pesan Disposisi / Koordinasi / Saran
                                        <small style="color:red"><b>*</b></small>
                                    </label>
    
                                    <select id="pesan_disposisi" class="form-control" style="width: 100%;" name="disp_ket" required oninvalid="this.setCustomValidity('Mohon pilih Pesan Disposisi dahulu!')" oninput="setCustomValidity('')">
                                        <option value=""></option>
                                        <option value="HADIRI">HADIRI</option>
                                        <option value="TINDAK LANJUTI">TINDAK LANJUTI</option>
                                        <option value="MENGIKUTI">MENGIKUTI</option>
                                        <option value="IKUTI">IKUTI</option>
                                        <option value="WAKILKAN">WAKILKAN</option>
                                        <option value="MENUGASKAN">MENUGASKAN</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>
                                        Instruksi / Saran / Pesan Tambahan
                                        <small style="color:red"><b>*</b></small>
                                    </label>
    
                                    <textarea name="disp_pesan" rows="3" class="form-control" id="pesan" required></textarea>
                                </div>

                              </div>
                          </div>
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                          <a href="{{ URL::to('/suratmasuk') }}">
                              <button type="button" class="btn btn-default">
                                  <i class="fas fa-arrow-circle-left"></i> Kembali
                              </button>
                          </a>
                        <button type="submit" class="btn btn-success float-right"><i class="fas fa-share"></i> Kirim</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
            </div>
        </div>
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

<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
$(function () {
    $('#tujuan_disposisi').select2({
        placeholder: "Pilih Tujuan Disposisi",
        theme: 'bootstrap4'
    });

    $('#pesan_disposisi').select2({
        placeholder: "Pilih Pesan Disposisi",
        theme: 'bootstrap4'
    });
})
</script>
@endsection