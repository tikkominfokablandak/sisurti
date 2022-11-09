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
        <div class="col-md-4">

<div class="card align-items-center">
  <div class="card-header">
    <h3 class="card-title">Surat Masuk</h3>
  </div>
  <div class="card-body">
    {{-- <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a&gt;</code> tag to achieve the following:</p> --}}
    <a href="{{ route('surat-masuk.create') }}" class="btn btn-app">
      <span class="badge bg-success">+</span>
      <i class="fas fa-file-signature"></i> Registrasi Surat Masuk
    </a>
    <a href="{{ route('surat-masuk.index') }}" class="btn btn-app">
      <span class="badge bg-warning">{{ number_format($suratmasuk); }}</span>
      <i class="fas fa-envelope"></i> Daftar Surat Masuk
    </a>    
  </div> 
  <!-- /.card-body -->
  <div class="card-footer" style="display: block;">
    {{-- Total status Surat keluar dan Surat masuk pada menu "Surat DINAS" --}}
  </div>
</div>
</div>
{{-- batas bawah container --}}

<div class="col-md-4">

  <div class="card align-items-center">
    <div class="card-header">
      <h3 class="card-title">Surat Keluar</h3>
    </div>
    <div class="card-body">
      {{-- <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a&gt;</code> tag to achieve the following:</p> --}}
      
      <a href="{{ route('surat-keluar.create') }}" class="btn btn-app">
        <span class="badge bg-success">+</span>
        <i class="fas fa-file-signature"></i> Registrasi Surat Keluar
      </a>
      <a class="btn btn-app">
        <span class="badge bg-warning">{{ number_format($suratkeluar); }}</span>
        <i class="fas fa-paper-plane"></i> Daftar Surat Keluar
      </a>
    </div> 
    <!-- /.card-body -->
    <div class="card-footer" style="display: block;">
      {{-- Total status Surat keluar dan Surat masuk pada menu "Surat DINAS" --}}
    </div>
  </div>
  </div>
  {{-- batas bawah container --}}

  <div class="col-md-4">

    <div class="card align-items-center">
      <div class="card-header">
        <h3 class="card-title">Disposisi Surat</h3>
      </div>
      <div class="card-body">
        {{-- <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a&gt;</code> tag to achieve the following:</p> --}}
        <a href="{{ route('surat-disposisi.index') }}" class="btn btn-app">
          <span class="badge bg-warning">0</span>
          <i class="fas icon-file-check-2"></i> Daftar Disposisi
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

{{-- Button Log Surat & Pengaturan--}}
<section class="content">
  <div class="container-fluid">
    <div class="row">
      {{-- Button Log Surat --}}
        <div class="col-md-6">
<div class="card align-items-center">
  <div class="card-header">
    <h3 class="card-title">Log Surat</h3>
  </div>
  <div class="card-body">
    {{-- <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a&gt;</code> tag to achieve the following:</p> --}}
    <a href="{{ route('log-surat-masuk.index') }}" class="btn btn-app">
      <span class="badge bg-success">{{ number_format($logsuratmasuk); }}</span>
      <i class="fas fa-envelope"></i> Log Surat Masuk
    </a>
    <a href="#" class="btn btn-app">
      <span class="badge bg-warning">0</span>
      <i class="fas fa-paper-plane"></i> Log Surat Keluar
    </a>
    <a href="#" class="btn btn-app">
      <span class="badge bg-warning">0</span>
      <i class="fas icon-file-check-2"></i> Log Disposisi
    </a>    
  </div> 
  <!-- /.card-body -->
  <div class="card-footer" style="display: block;">
    {{-- Total status Surat keluar dan Surat masuk pada menu "Surat DINAS" --}}
  </div>
</div>
</div>
{{-- batas bawah container --}}

{{-- Button Pengaturan --}}
<div class="col-md-6">
  <div class="card align-items-center">
    <div class="card-header">
      <h3 class="card-title">Pengaturan</h3>
    </div>
    <div class="card-body">
      {{-- <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a&gt;</code> tag to achieve the following:</p> --}}
      
      <a href="{{ route('template-surat.index') }}" class="btn btn-app">
        <span class="badge bg-success">{{ number_format($templatesurat); }}</span>
        <i class="fas fa-file-upload"></i> Template Surat
      </a>
      <a href="{{ route('tujuan.index') }}" class="btn btn-app">
        <span class="badge bg-warning">{{ number_format($tujuan); }}</span>
        <i class="fas fa-paper-plane"></i> Daftar Tujuan
      </a>
      <a href="{{ route('daftar-tembusan.index') }}" class="btn btn-app">
        <span class="badge bg-warning">{{ number_format($tembusan); }}</span>
        <i class="fas icon-file-check-2"></i> Daftar Tembusan
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