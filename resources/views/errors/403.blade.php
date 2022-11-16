@extends('errors::minimal')

@section('title', __('Di Larang'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Di Larang'))
