@extends('layouts.app')

@section('title')
    | Ganti Kata Sandi
@endsection

@section('content')
<section class="content">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    {{-- <div class="panel-heading">Change Password</div> --}}
                    <div class="panel-body">
                        @if($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                        @endif
                        @if(Session::get('error') && Session::get('error') != null)
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @php
                        Session::put('error', null)
                        @endphp
                        @endif
                        @if(Session::get('success') && Session::get('success') != null)
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @php
                        Session::put('success', null)
                        @endphp
                        @endif
    
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('postChangePassword') }}">
                            @csrf

                            <div class="form-group">
                                <label for="current_password" class="col-md-4 control-label">Kata Sandi Lama</label>
    
                                <div class="col-md-10">
                                    <input id="current_password" type="password" class="form-control" name="current_password" autofocus placeholder="Kata Sandi Lama ..." required oninvalid="this.setCustomValidity('Mohon isi Kata Sandi Lama terlebih dahulu!')" oninput="setCustomValidity('')">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="new_password" class="col-md-4 control-label">Kata Sandi Baru</label>
    
                                <div class="col-md-10">
                                    <input id="new_password" type="password" class="form-control" name="new_password" placeholder="Kata Sandi Baru ..." required oninvalid="this.setCustomValidity('Mohon isi Kata Sandi Baru terlebih dahulu!')" oninput="setCustomValidity('')">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="new_password_confirmation" class="col-md-4 control-label">Konfirmasi Kata Sandi Baru</label>
    
                                <div class="col-md-10">
                                    <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" placeholder="Konfirmasi Kata Sandi Baru ..." required oninvalid="this.setCustomValidity('Mohon isi Konfirmasi Kata Sandi Baru terlebih dahulu!')" oninput="setCustomValidity('')">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Ganti Kata Sandi
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection