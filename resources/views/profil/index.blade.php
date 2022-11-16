@extends('layouts.app')

@section('content')

  {{-- {{ dd(Auth::user->foto()) }} --}}

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profil</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">User Profil</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="card card-primary card-outline">
            <div class="card-body box-profil">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/img/profil/'.Auth::user()->foto) }}" alt="{{ Auth::user()->nama }}">
              </div>
              <h3 class="profile-username text-center">{{ $user->nama }}</h3>
              <p class="text-muted text-center">{{ $user->nip }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            {{-- <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a href="#data" class="nav-link active" data-toggle="tab">Data</a>
                </li>
              </ul>
            </div> --}}
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="data">
                  <form action="" class="form-horizontal">
                    <div class="form-group row">
                      <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" id="inputName" value="{{ $user->nama}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="username" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" id="inputName" value="{{ $user->username}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputName" value="{{ $user->email }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="no_hp" class="col-sm-2 col-form-label">Nomor Seluler</label>
                      <div class="col-sm-10">
                        <input type="text" name="no_hp" class="form-control" id="inputName" value="{{ $user->no_hp }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="opd" class="col-sm-2 col-form-label">OPD / Unit Kerja</label>
                      <div class="col-sm-5">
                        <textarea rows="3" name="opd" class="form-control" id="inputName" readonly>{{ $user->nama_opd }}</textarea>
                      </div>
                      <div class="col-sm-5">
                        <input type="text" name="unitkerja" class="form-control" id="inputName" value="{{ $user->nama_unitkerja }}" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="hak_akses" class="col-sm-2 col-form-label">Hak Akses</label>
                      <div class="col-sm-10">
                        <input type="text" name="hak_akses" class="form-control" id="inputName" value="{{ $user->nama_role }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="jenis_pengguna" class="col-sm-2 col-form-label">Jenis Pengguna</label>
                      <div class="col-sm-10">
                        <input type="text" name="jenis_pengguna" class="form-control" id="inputName" value="{{ $user->jenis_user }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                      <div class="col-sm-10">
                        <input type="text" name="jabatan" class="form-control" id="inputName" value="{{ $user->nama_jabatan }}" readonly>
                      </div>
                    </div>
                    
                    {{-- <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Edit Profil</button>
                      </div>
                    </div> --}}
                  </form>
                </div>
              </div>
            </div>
            <div class="card-footer">
                <a href="{{ url('profil/'. Auth::user()->id .'/edit') }}" class="btn btn-info">Edit Profil</a>
                <a href="{{ url('change-password') }}" class="btn btn-warning float-right">Ganti Password</a>
            </div>
          </div>
          {{-- <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Informasi</h3>
            </div>
            <div class="card-body">
              <strong>
                <i class="fas fa-user mr-1"></i>Username
              </strong>
              <p class="text-muted">{{ $user->username }}</p>
              <hr>
              <strong>
                <i class="fas fa-envelope mr-1"></i>Email
              </strong>
              <p class="text-muted">{{ $user->email }}</p>
              <hr>
              <strong>
                <i class="fas fa-phone mr-1"></i>No HP
              </strong>
              <p class="text-muted">{{ $user->no_hp }}</p>
              <hr>
              <strong>
                <i class="fas fa-award mr-1"></i>Pangkat
              </strong>
              <p class="text-muted">{{ $user->pangkat }}</p>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </section>

@endsection