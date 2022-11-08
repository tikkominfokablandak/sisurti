@extends('layouts.app')

@section('title')
    | Tambah Unit Kerja
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
          <h1 class="m-0">Unit Kerja</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/unitkerjas') }}">Unit Kerja</a></li>
            <li class="breadcrumb-item active">Tambah Unit Kerja</li>
          </ol>
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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus"></i> Form Unit Kerja Baru</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form method="POST" action="{{ route('unitkerja.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nama_unitkerja">{{ __('Nama Unit Kerja') }}</label>

                                <input id="nama_unitkerja" type="text" class="form-control @error('nama_unitkerja') is-invalid @enderror" name="nama_unitkerja" value="{{ old('nama_unitkerja') }}" placeholder="Masukan nama unit kerja ..." required autocomplete="nama_unitkerja" autofocus oninvalid="this.setCustomValidity('Mohon isi nama Unit Kerja terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('nama_unitkerja')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="induk_unitkerja">{{ __('Induk Unit Kerja') }}</label>

                                <input id="induk_unitkerja" type="text" class="form-control @error('induk_unitkerja') is-invalid @enderror" placeholder="Masukan induk unit kerja OPD ..." name="induk_unitkerja" value="{{ old('induk_unitkerja') }}" autocomplete="induk_unitkerja" autofocus oninvalid="this.setCustomValidity('Mohon isi induk unit kerja terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('induk_unitkerja')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat">{{ __('Alamat') }}</label>

                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan Alamat Lengkap ..." name="alamat" value="{{ old('alamat') }}" autocomplete="alamat" autofocus oninvalid="this.setCustomValidity('Mohon isi alamat lengkap terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>OPD</label>
                                <select id="opd" name="id_opd" class="form-control @error('opd') is-invalid @enderror" style="width: 100%;" required oninvalid = "this.setCustomValidity('Mohon pilih OPD dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>
                                    @foreach ($opd as $op)
                                        <option value="{{ $op->id }}">{{ $op->nama_opd }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="{{ URL::to('/unitkerja') }}">
                        <button type="button" class="btn btn-default">
                            <i class="fas fa-arrow-circle-left"></i> Kembali
                        </button>
                    </a>
                  <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection

@push('javascript-internal')
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
  $(document).ready(function() {
    $('#opd').select2({
      theme: 'bootstrap4',
      allowClear: true,
      placeholder: "Pilih OPD",
      theme: 'bootstrap4'
    });
  });
</script>

@endpush