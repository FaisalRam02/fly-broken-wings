@extends('adminlte::page')

@section('title', 'Manage Pekerjaan')

@section('content')
    <div class="container mt-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
            <i class="fas fa-plus"></i>Tambah Pekerjaan
        </button>

        @if(session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered mt-3 table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Nama Pekerjaan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pekerjaans as $index => $pekerjaan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pekerjaan->nama_pekerjaan }}</td>
                        <td>

                            <!-- Edit Button -->
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" 
                                onclick="editPekerjaan({{ $pekerjaan }})">
                                <i class="fas fa-edit"></i> Edit
                            </button>

                            <!-- Delete Button -->
                            <form action="{{ route('pekerjaan.destroy', $pekerjaan->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="return confirm('menghapus lowongan pekerjaan?😨')">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('pekerjaan.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambah Pekerjaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_pekerjaan">Nama Pekerjaan</label>
                            <input type="text" id="nama_pekerjaan" name="nama_pekerjaan" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" id="editForm" action="">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Pekerjaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editNamaPekerjaan">Nama Pekerjaan</label>
                            <input type="text" id="editNamaPekerjaan" name="nama_pekerjaan" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .table {
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            margin-right: 0.5rem;
        }

        .modal-header {
            background-color: #9FA6B2;
            color: white;
        }

        .modal-title {
            font-weight: bold;
        }

        .modal-footer .btn-secondary {
            background-color: #6c757d;
        }
    </style>
@endsection

@section('js')
<script>
    function editPekerjaan(pekerjaan) {
        $('#editForm').attr('action', '/pekerjaan/' + pekerjaan.id);
        $('#editNamaPekerjaan').val(pekerjaan.nama_pekerjaan);
    }
</script>
@endsection
