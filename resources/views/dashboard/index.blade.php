@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <div class="row my-3 mt-3">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-secondary">
                <div class="inner">
                    <h5>User Management</h5>
                    <p>User</p>
                </div>
                <a href="{{ route ('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-secondary">
                <div class="inner">
                    <h5>Penduduk Management</h5>
                    <p>Data Penduduk</p>
                </div>
                <a href="{{ route ('penduduk.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-secondary">
                <div class="inner">
                    <h5>Penduduk Management</h5>
                    <p>Pekerjaan</p>
                </div>
                <a href="{{ route ('pekerjaan.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-secondary">
                <div class="inner">
                    <h5>Layanan</h5>
                    <p>Surat</p>
                </div>
                <a href="{{ route ('surat.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-secondary">
                <div class="inner">
                    <h5>Layanan</h5>
                    <p>Dokumen</p>
                </div>
                <a href="{{ route ('documents.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-secondary">
                <div class="inner">
                    <h5>Layanan</h5>
                    <p>Kategori</p>
                </div>
                <a href="{{ route ('kategori.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
@stop
