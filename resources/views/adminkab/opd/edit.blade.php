@extends('layouts.app')

@section('title')
    | Tambah OPD |
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
          <h1 class="m-0">OPD</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/opd') }}">OPD</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/opd/' . $opd->id) }}">{{ $opd->nama_opd }}</a></li>
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
                <h3 class="card-title"><i class="fas fa-user-plus"></i> Form Edit OPD <b>{{ $opd->nama_opd}}</b></h3>
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
              <form method="POST" action="{{ route('opd.update', [$opd->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nama_opd">{{ __('Nama OPD') }}</label>

                                <input id="nama_opd" type="text" class="form-control @error('nama_opd') is-invalid @enderror" name="nama_opd" value="{{ $opd->nama_opd }}" placeholder="Masukan nama OPD ..." required autocomplete="nama_opd" autofocus oninvalid="this.setCustomValidity('Mohon isi nama OPD terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('nama_opd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="singkatan">{{ __('Singkatan') }}</label>

                                <input id="singkatan" type="text" class="form-control @error('singkatan') is-invalid @enderror" placeholder="Masukan singkatan OPD ..." name="singkatan" value="{{ $opd->singkatan }}" required autocomplete="singkatan" autofocus oninvalid="this.setCustomValidity('Mohon isi Singkatan terlebih dahulu!')" oninput="setCustomValidity('')">

                                @error('singkatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat">{{ __('Alamat') }}</label>

                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan Alamat Lengkap ..." name="alamat" value="{{ $opd->alamat }}" autocomplete="alamat" autofocus oninvalid="this.setCustomValidity('Mohon isi alamat lengkap terlebih dahulu!')" oninput="setCustomValidity('')">

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
                    <a href="{{ URL::to('/opd') }}">
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
<script>
$(document).ready(function() {

    //  select opd:start
    $('#select_opd').select2({
        theme: 'bootstrap4',
        allowClear: true,
        ajax: {
            url: "{{ route('get-opd.select') }}",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                    return {
                        text: item.nama_opd,
                        id: item.id
                    }
                    })
                };
            }
        }
    });
    //  select opd:end

    //  Event on change select opd:start
    $('#select_opd').change(function() {
        //clear select
        $('#select_unitkerja').empty();
        $("#select_jabatan").empty();
        //set id
        let opdID = $(this).val();
        if (opdID) {
            $('#select_unitkerja').select2({
                theme: 'bootstrap4',
                allowClear: true,
                ajax: {
                    url: "{{ route('get-unitkerja.select') }}?opdID=" + opdID,
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama_unitkerja,
                                id: item.id
                            }
                        })
                    };
                    }
                }
            });
        } else {
            $('#select_unitkerja').empty();
            $("#select_jabatan").empty();
        }
    });
    //  Event on change select opd:end

    //  Event on change select unit kerja:start
    $('#select_unitkerja').change(function() {
        //clear select
        $("#select_jabatan").empty();
        //set id
        let unitkerjaID = $(this).val();
        if (unitkerjaID) {
            $('#select_jabatan').select2({
                theme: 'bootstrap4',
                allowClear: true,
                ajax: {
                    url: "{{ route('get-jabatan.select') }}?unitkerjaID=" + unitkerjaID,
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama_jabatan,
                                id: item.id
                            }
                        })
                    };
                    }
                }
            });
        } else {
            $("#select_jabatan").empty();
        }
    });
    //  Event on change select regency:end

    // EVENT ON CLEAR
    $('#select_opd').on('select2:clear', function(e) {
    $("#select_unitkerja").select2(
            {theme: 'bootstrap4',}
        );
        $("#select_jabatan").select2(
            {theme: 'bootstrap4',}
        );
    });

    $('#select_unitkerja').on('select2:clear', function(e) {
    $("#select_jabatan").select2(
        {theme: 'bootstrap4',}
        );
    });
});
</script>
@endpush

@section('script')
<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
$(function () {
    $('#grup_jabatan').select2({
        placeholder: "Pilih Grup Jabatan",
        theme: 'bootstrap4'
    });

    $('#hak_akses').select2({
        placeholder: "Pilih Hak Akses",
        theme: 'bootstrap4'
    });

    $('#jenis_user').select2({
        placeholder: "Pilih Jenis Pengguna",
        theme: 'bootstrap4'
    });

    bsCustomFileInput.init();
});

var has_errors = {{ $errors->count() > 0 ? 'true' : 'false' }};

if ( has_errors ){
    Swal.fire({
        title: 'Gagal menyimpan data!',
        icon: 'error',
        html: jQuery("#ERROR_COPY").html(),
        showCloseButton: true,
        timer: 5000,
        timerProgressBar: true,
    })
}
</script>
<!-- bs-custom-file-input -->
<script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script type="text/javascript">
    $('#customFile').change(function(){
           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 
  
   });
</script>
@endsection