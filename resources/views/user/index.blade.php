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

{{-- Button Dashboard User --}}
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
    <a href="/suratmasuk" class="btn btn-app">
      <span class="badge bg-success"></span>
      {{-- {{ number_format($opd); }} --}}
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
      <h3 class="card-title">Disposisi</h3>
    </div>
    <div class="card-body">
      {{-- <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a&gt;</code> tag to achieve the following:</p> --}}
      
      <a href="/disposisi" class="btn btn-app">
        <span class="badge bg-success"></span>
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

  <div class="col-md-4">

    <div class="card align-items-center">
      <div class="card-header">
        <h3 class="card-title">Tindak Lanjut</h3>
      </div>
      <div class="card-body">
        {{-- <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a&gt;</code> tag to achieve the following:</p> --}}
        <a href="/tindak-lanjut" class="btn btn-app">
          <span class="badge bg-success"></span>
          <i class="fas fa-file-signature"></i> Daftar Tindak Lanjut
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