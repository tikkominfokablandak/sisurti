@extends('layouts.app')

@section('content')

&nbsp

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
			<div class="card">
              <div class="card-body">
              	<!-- <i class="nav-icon fas fa-home"</i> -->
                <h5 class="card-title">Beranda - Selamat Datang, <b>{{ Auth::user()->nama }}</b> !</h5>

                <!-- <p class="card-text">
                   
                </p>

                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a> -->
              </div>
            </div>
        </div>
    </div>
</div>

{{-- Button Surat Dinas --}}
<section class="content">
  <div class="container-fluid">
    <div class="row">
      {{-- <div class="col-12"> --}}
        <div class="col-md-3">

<div class="card align-items-center">
  <div class="card-header">
    <h3 class="card-title">OPD</h3>
  </div>
  <div class="card-body">
    {{-- <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a&gt;</code> tag to achieve the following:</p> --}}
    <a href="{{ route('opd.index') }}" class="btn btn-app">
      <span class="badge bg-success">{{ number_format($opd); }}</span>
      <i class="fas fa-landmark"></i> P&nbsp;e&nbsp;n&nbsp;g&nbsp;a&nbsp;t&nbsp;u&nbsp;r&nbsp;a&nbsp;n &nbsp;&nbsp;OPD
    </a> 
  </div> 
  <!-- /.card-body -->
  <div class="card-footer" style="display: block;">
    {{-- Total status Surat keluar dan Surat masuk pada menu "Surat DINAS" --}}
  </div>
</div>
</div>
{{-- batas bawah container --}}

<div class="col-md-3">

  <div class="card align-items-center">
    <div class="card-header">
      <h3 class="card-title">Unit Kerja</h3>
    </div>
    <div class="card-body">
      {{-- <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a&gt;</code> tag to achieve the following:</p> --}}
      
      <a href="{{ route('unitkerja.index') }}" class="btn btn-app">
        <span class="badge bg-success">{{ number_format($unitkerja); }}</span>
        <i class="fas fa-users"></i> Pengaturan Unit Kerja
      </a>
    </div> 
    <!-- /.card-body -->
    <div class="card-footer" style="display: block;">
      {{-- Total status Surat keluar dan Surat masuk pada menu "Surat DINAS" --}}
    </div>
  </div>
  </div>
  {{-- batas bawah container --}}

  <div class="col-md-3">

    <div class="card align-items-center">
      <div class="card-header">
        <h3 class="card-title">Jabatan</h3>
      </div>
      <div class="card-body">
        {{-- <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a&gt;</code> tag to achieve the following:</p> --}}
        <a href="{{ route('jabatan.index') }}" class="btn btn-app">
          <span class="badge bg-success">{{ number_format($jabatan); }}</span>
          <i class="fas fa-user-tie"></i> Pengaturan Jabatan
        </a>
      </div> 
      <!-- /.card-body -->
      <div class="card-footer" style="display: block;">
        {{-- Total status Surat keluar dan Surat masuk pada menu "Surat DINAS" --}}
      </div>
    </div>
    </div>
    {{-- batas bawah container --}}

    <div class="col-md-3">

      <div class="card align-items-center">
        <div class="card-header">
          <h3 class="card-title">Pengguna</h3>
        </div>
        <div class="card-body">
          {{-- <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a&gt;</code> tag to achieve the following:</p> --}}
          <a href="{{ route('users.index') }}" class="btn btn-app">
            <span class="badge bg-success">{{ number_format($pengguna); }}</span>
            <i class="fas fa-user"></i> Pengaturan Pengguna
          </a>
        </div> 
        <!-- /.card-body -->
        <div class="card-footer" style="display: block;">
          {{-- Total status Surat keluar dan Surat masuk pada menu "Surat DINAS" --}}
        </div>
      </div>
      </div>
      {{-- batas bawah container --}}
</div></div>
</section>



@endsection