@extends('adminlte::page')

@section('title', 'Profil Pengguna')

@section('content')
    <div class="container-fluid bg-light py-4" style="background-color: #f8f9fa;">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h3 class="card-title">Profil Anda, Master Hebat</h3>
            </div>
            <div class="card-body">
                <form action="{{ url()->current() }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-3 text-center">
                            @if ($user->photo)
                            <img src="{{ asset('img/' . $user->photo) }}" alt="Foto Profil" class="img-fluid shadow-sm mb-3">
                            @else
                                <span>No Foto</span>
                            @endif
                        </div>
                        <div class="col-md-9">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Nama:</th>
                                    <td>
                                        <span>{{ $user->name }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>
                                        <span>{{ $user->email }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin:</th>
                                    <td>
                                        <span>{{ $user->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
<style>
    .card {
        border-radius: 10px;
    }

    .text-muted {
        color: #fff;
    }

    .card-body {
        background-color: #808080;
        color: #fff;
    }

    .card-header {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .table th {
        width: 30%;
    }

    .img-fluid {
        max-width: 100%;
        max-height: 100%;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .shadow-sm {
        box-shadow: 0 .125rem .25rem rgba(0, 0, 0, 0.075) !important;
    }

    .btn-primary, .btn-success {
        background-color: #007bff;
        border-color: #007bff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .btn-primary:hover, .btn-success:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .container-fluid {
        background-color: #f8f9fa;
    }

    .card-footer {
        background-color: #343A40;
        color: dark;
    }
</style>
@stop
