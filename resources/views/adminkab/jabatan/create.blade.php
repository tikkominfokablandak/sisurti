@extends('layouts.app')

@section('title')
    | Tambah Data Jabatan
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
          <h1 class="m-0">Jabatan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/jabatan') }}">Jabatan</a></li>
            <li class="breadcrumb-item active">Tambah Data Jabatan</li>
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
                <h3 class="card-title"><i class="fas fa-user-plus"></i> Form Jabatan Baru</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form method="POST" action="{{ route('jabatan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nama_jabatan">{{ __('Nama Jabatan') }}</label>

                                <input id="nama_jabatan" type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" name="nama_jabatan" value="{{ old('nama_jabatan') }}" placeholder="Masukan nama jabatan ..." required autocomplete="nama_jabatan" autofocus oninvalid="this.setCustomValidity('Mohon isi nama jabatan terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('nama_jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="opd">{{ __('OPD') }}</label>

                                <select id="opd" name="opd" data-placeholder="Pilih OPD" class="form-control @error('opd') is-invalid @enderror" style="width: 100%;" oninvalid="this.setCustomValidity('Mohon pilih OPD dahulu!')" oninput="setCustomValidity('')">
                                    @foreach ($opd as $op)
                                        <option value="{{ $op->id }}" >{{ $op->nama_opd }}</option>
                                    @endforeach
                                </select>
                                
                                @error('opd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="id_unitkerja">{{ __('Unit Kerja') }}</label>

                                <select id="id_unitkerja" name="id_unitkerja" data-placeholder="Pilih id_unitkerja" class="form-control @error('id_unitkerja') is-invalid @enderror" style="width: 100%;" oninvalid="this.setCustomValidity('Mohon pilih id_unitkerja dahulu!')" oninput="setCustomValidity('')">
                                    @foreach ($unitkerja as $op)
                                        <option value="{{ $op->id }}" >{{ $op->nama_unitkerja }}</option>
                                    @endforeach
                                </select>

                                @error('id_unitkerja')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="induk_jabatan">{{ __('Induk Jabatan') }}</label>

                                <input id="induk_jabatan" type="text" class="form-control @error('induk_jabatan') is-invalid @enderror" placeholder="Masukan induk Jabatan Lengkap ..." name="induk_jabatan" value="{{ old('induk_jabatan') }}" autocomplete="induk_jabatan" autofocus oninvalid="this.setCustomValidity('Mohon isi Induk Jabatan lengkap terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('induk_jabatan')
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
                    <a href="{{ URL::to('/jabatan') }}">
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