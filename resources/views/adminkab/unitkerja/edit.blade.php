@extends('layouts.app')

@section('title')
    | Edit Unit Kerja |
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
            <li class="breadcrumb-item"><a href="{{ url('/unitkerja') }}">Unit Kerja</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/unitkerja/' . $unitkerja->id) }}">{{ $unitkerja->nama_unitkerja }}</a></li>
            <li class="breadcrumb-item active">Edit</li>
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
                <h3 class="card-title"><i class="fas fa-user-plus"></i> Form Edit Data Unit kerja <b>{{ $unitkerja->nama_unitkerja}}</b></h3>
              </div>
              <!-- /.card-header -->

              @if ($errors->count() > 0)
              <div id="ERROR_COPY" style="display: none;" class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br/>
                        <br/>
                    @endforeach
              </div>
              @endif

              <!-- form start -->
              <form method="POST" action="{{ route('unitkerja.update', [$unitkerja->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nama_unitkerja">{{ __('Nama Unit Kerja') }}</label>

                                <input id="nama_unitkerja" type="text" class="form-control @error('nama_unitkerja') is-invalid @enderror" name="nama_unitkerja" value="{{ $unitkerja->nama_unitkerja }}" placeholder="Masukan nama OPD ..." autocomplete="nama_unitkerja" autofocus oninvalid="this.setCustomValidity('Mohon isi nama OPD terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('nama_unitkerja')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="induk_unitkerja">{{ __('Induk Unit Kerja') }}</label>

                                <input id="induk_unitkerja" type="text" class="form-control @error('induk_unitkerja') is-invalid @enderror" placeholder="Masukan Induk Unit Kerja..." name="induk_unitkerja" value="{{ $unitkerja->induk_unitkerja }}" autocomplete="induk_unitkerja" autofocus oninvalid="this.setCustomValidity('Mohon isi induk_unitkerja terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('induk_unitkerja')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat">{{ __('Alamat') }}</label>

                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan Alamat Lengkap ..." name="alamat" value="{{ $unitkerja->alamat }}" autocomplete="alamat" autofocus oninvalid="this.setCustomValidity('Mohon isi alamat lengkap terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="id_opd">{{ __('Nama OPD') }}</label>

                                <select id="id_opd" name="id_opd" data-placeholder="Pilih OPD" class="form-control @error('select_opd') is-invalid @enderror" style="width: 100%;" oninvalid="this.setCustomValidity('Mohon pilih OPD dahulu!')" oninput="setCustomValidity('')">
                                    @foreach ($opd as $op)
                                        <option value="{{ $op->id }}" {{ $op->id == $unitkerja->id_opd ? 'selected' : '' }}>{{ $op->nama_opd }}</option>
                                    @endforeach
                                </select>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
