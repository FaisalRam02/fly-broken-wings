@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
<div class="row">
    <div class="col-md-3 col-sm-5">
        <div class="small-box bg-secondary custom-small" style="margin-top: 30px; margin-left: 20px;">
            <div class="inner">
              <h5>User Management</h5>
              <p>User</p>
            </div>
            <div class="icon">
              <i class="fas fa-fw fa-users-cog"></i>
            </div>
            <a href="{{ route('users.index') }}" class="nav-link small-box-footer {{ Request::is('payung') ? 'active' : '' }}">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-md-3 col-sm-5">
        <div class="small-box bg-secondary custom-small" style="margin-top: 30px; margin-left: 20px;">
            <div class="inner">
              <h5>Penduduk Management</h5>
              <p>Data penduduk</p>
            </div>
            <div class="icon">
              <i class="fas fa-fw fa-users"></i>
            </div>
            <a href="{{ route('penduduk.index') }}" class="nav-link small-box-footer {{ Request::is('surat') ? 'active' : '' }}">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-sm-5">
        <div class="small-box bg-secondary custom-small" style="margin-top: 30px; margin-left: 20px;">
            <div class="inner">
              <h5>Penduduk Management</h5>
              <p>Pekerjaan</p>
            </div>
            <div class="icon">
              <i class="fas fa-fw fa-briefcase"></i>
            </div>
            <a href="{{ route('pekerjaan.index') }}" class="nav-link small-box-footer {{ Request::is('jenis_surats') ? 'active' : '' }}">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-md-3 col-sm-5">
    <div class="small-box bg-secondary custom-small" style="margin-top: 20px; margin-left: 20px;">
        <div class="inner">
          <h5>Layanan Persuratan</h5>
          <p>Surat</p>
        </div>
        <div class="icon">
          <i class="fas fa-fw fa-envelope"></i>
        </div>
        <a href="{{ route('penduduk.index') }}" class="nav-link small-box-footer {{ Request::is('penduduk') ? 'active' : '' }}">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<div class="col-md-3 col-sm-5">
  <div class="small-box bg-secondary custom-small" style="margin-top: 20px; margin-left: 20px;">
      <div class="inner">
        <h5>Layanan Persuratan</h5>
        <p>Document</p>
      </div>
      <div class="icon">
        <i class="fas fa-fw fa-folder"></i>
      </div>
      <a href="{{ route('documents.index') }}" class="nav-link small-box-footer {{ Request::is('pekerjaan') ? 'active' : '' }}">
        More info <i class="fas fa-arrow-circle-right"></i>
      </a>
  </div>
</div>
<div class="col-md-3 col-sm-5">
  <div class="small-box bg-secondary custom-small" style="margin-top: 20px; margin-left: 20px;">
      <div class="inner">
        <h5>Layanan Persuratan</h5>
        <p>Kategori</p>
      </div>
      <div class="icon">
        <i class="fas fa-fw fa-file"></i>
      </div>
      <a href="{{ route('surat.index') }}" class="nav-link small-box-footer {{ Request::is('kategori') ? 'active' : '' }}">
        More info <i class="fas fa-arrow-circle-right"></i>
      </a>
  </div>
</div>
</div>
@stop
