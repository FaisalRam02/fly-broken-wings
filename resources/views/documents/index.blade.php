@extends('adminlte::page')

@section('content')
<div class="container">

    <!-- Button to open the Create Document modal -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createDocumentModal">
        Create Document
    </button>

    <!-- Create Document Modal -->
    <div class="modal fade" id="createDocumentModal" tabindex="-1" role="dialog" aria-labelledby="createDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createDocumentModalLabel">Create Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('documents.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Surat</label>
                            <input type="text" name="nama_surat" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Document</label>
                            <select name="kategori_id" class="form-control" required>
                                <option disabled selected>Pilih Kategori</option>
                                @foreach($kategori as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Document Modal -->
    <div class="modal fade" id="editDocumentModal" tabindex="-1" role="dialog" aria-labelledby="editDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDocumentModalLabel">Edit Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="editDocumentForm">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Surat</label>
                            <input type="text" name="nama_surat" class="form-control" id="editNamaSurat" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori_id" class="form-control" id="editKategori" required>
                                @foreach($kategori as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Table to display documents -->
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Nama Surat</th>
                <th>Kategori</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    @foreach($documents as $doc)
    <tr>
        <td>{{ $doc->nama_surat }}</td>
        <td>{{ $doc->kategori->nama_kategori }}</td>
        <td>
            <!-- Edit document button -->
            <button class="btn btn-warning edit-btn" data-id="{{ $doc->id }}" data-nama="{{ $doc->nama_surat }}" data-kategori="{{ $doc->kategori_id }}" data-toggle="modal" data-target="#editDocumentModal">Edit</button>

            <!-- Delete document button -->
            <form action="{{ route('documents.destroy', $doc->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
        </tbody>
    </table>
</div>

<!-- Script to handle Edit Modals -->
<script>
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const docId = this.getAttribute('data-id');
            const namaSurat = this.getAttribute('data-nama');
            const kategoriId = this.getAttribute('data-kategori');

            document.getElementById('editNamaSurat').value = namaSurat;
            document.querySelector(`#editKategori option[value="${kategoriId}"]`).selected = true;
            document.getElementById('editDocumentForm').action = '/documents/' + docId;
        });
    });
</script>

<!-- Styling -->
<style>
    .table {
        margin-top: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .btn {
        border-radius: 5px;
    }

    .modal-content {
        border-radius: 10px;
    }

    .form-group label {
        font-weight: bold;
    }

    .modal-header {
        background-color: #007bff;
        color: white;
    }

    .modal-title {
        font-weight: bold;
    }

    .modal-footer button {
        margin-left: 10px;
    }

    .modal-body form input, .modal-body form select {
        border: 1px solid #ced4da;
        border-radius: 5px;
    }
</style>
@endsection
