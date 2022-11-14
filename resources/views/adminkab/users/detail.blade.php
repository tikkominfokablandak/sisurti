@extends('layouts.app')

@section('title')
    | Pengguna | {{ $user->nama }}
@endsection

@section('css')

@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pengguna</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/users') }}">Pengguna</a></li>
            <li class="breadcrumb-item active">{{ $user->nama }}</li>
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
                <h3 class="card-title"><i class="fas fa-user"></i> Data Lengkap <b>{{ $user->nama }}</b></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <dl>
                                <dt>Nomor Induk Pegawai</dt>
                                <dd>{{ $user->nip }}</dd>
                                <dt>Nomor Induk Kepedudukan</dt>
                                <dd>{{ $user->nik }}</dd>
                                <dt>Nama Lengkap</dt>
                                <dd>{{ $user->nama }}</dd>
                                <dt>Nomor Seluler</dt>
                                <dd>{{ $user->no_hp }}</dd>
                                <dt>Nama Pengguna</dt>
                                <dd>{{ $user->username }}</dd>
                                <dt>Email</dt>
                                <dd>{{ $user->email }}</dd>
                                <dt>Foto</dt>
                                <dd><img src="{{ asset('storage/img/profil/'.$user->foto) }}" alt="Foto {{ $user->nama }}" style="width:200px"></dd>
                            </dl>
                        </div>
                        <div class="col-sm-6">
                            <dl>
                                <dt>Hak Akses</dt>
                                <dd>{{ $user->nama_role }}</dd>
                                <dt>Instansi / Unit Kerja</dt>
                                <dd>{{ $user->nama_opd }} / {{ $user->nama_unitkerja }}</dd>
                                <dt>Jabatan</dt>
                                <dd>{{ $user->nama_jabatan }}</dd>
                                <dt>Grup Jabatan</dt>
                                <dd>{{ $user->pangkat }}</dd>
                                <dt>Jenis Pengguna</dt>
                                <dd>{{ $user->jenis_user }}</dd>
                                <dt>Status</dt>
                                <dd>
                                    @if( $user->active == 1 )
                                      <span class="badge bg-success">Aktif</span>
                                    @elseif( $user->active == 0 )
                                      <span class="badge bg-danger">Tidak Aktif</span>
                                    @endif
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{ URL::to('/users') }}">
                    <button type="button" class="btn btn-default">
                        <i class="fas fa-arrow-circle-left"></i> Kembali
                    </button>
                  </a>
                  <a href="{{ URL::to('/users/'.$user->id.'/edit') }}">
                    <button type="button" class="btn btn-warning float-right">
                      <i class="fa fa-edit"></i> Edit
                    </button>
                  </a>
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

@section('script')

@endsection