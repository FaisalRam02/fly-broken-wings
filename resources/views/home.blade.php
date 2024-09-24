@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>HALO EVERNYAN</b></h1>
@stop

@section('content')
    <a href="{{ route('dashboard.index') }}" class="">klik di sini untuk pergi ke dashboard</a>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop