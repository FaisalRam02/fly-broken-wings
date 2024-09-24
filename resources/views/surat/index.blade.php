@extends('adminlte::page')

@section('content')
<div class="container">
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createSuratModal">
        Buat Surat Baru
    </button>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Surat</th>
                <th>Nama Pengaju</th>
                <th>Tanggal Diterima</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($surats as $surat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $surat->document ? $surat->document->nama_surat : 'Tidak ada' }}</td>
                <td>{{ $surat->nama_pengaju }}</td>
                <td>{{ $surat->tanggal_diterima }}</td>
                <td>{{ ucfirst($surat->status) }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editSuratModal{{ $surat->id }}">
                        Edit
                    </button>
                    <a href="{{ route('surat.printPdf', $surat->id) }}" class="btn btn-secondary" target="_blank">
                        <i class="bi bi-printer"></i>Print
                    </a>

                    <!-- Tombol untuk membuka modal persetujuan -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#statusModal{{ $surat->id }}">
                        Ubah Status
                    </button>
                    
                    <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Modal untuk Edit Surat -->
            <div class="modal fade" id="editSuratModal{{ $surat->id }}" tabindex="-1" aria-labelledby="editSuratModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editSuratModalLabel">Edit Surat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('surat.update', $surat->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="documents_id">Nama Surat</label>
                                    <select name="documents_id" class="form-control" required>
                                        @foreach($documents as $document)
                                            <option value="{{ $document->id }}" {{ $document->id == $surat->documents_id ? 'selected' : '' }}>{{ $document->nama_surat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pengaju">Nama Pengaju</label>
                                    <input type="text" class="form-control" name="nama_pengaju" value="{{ $surat->nama_pengaju }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_diterima">Tanggal Diterima</label>
                                    <input type="date" class="form-control" name="tanggal_diterima" value="{{ $surat->tanggal_diterima }}" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal untuk Ubah Status Surat -->
            <div class="modal fade" id="statusModal{{ $surat->id }}" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="statusModalLabel">Ubah Status Surat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin mengubah status surat ini?</p>
                            <div class="modal-footer">
                                <form action="{{ route('surat.updateStatus', [$surat->id, 'disetujui']) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin menyetujui surat ini?')">Disetujui</button>
                                </form>
                                <form action="{{ route('surat.updateStatus', [$surat->id, 'ditolak']) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menolak surat ini?')">Ditolak</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>

    <!-- Modal untuk Membuat Surat -->
    <div class="modal fade" id="createSuratModal" tabindex="-1" aria-labelledby="createSuratModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSuratModalLabel">Buat Surat Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('surat.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="documents_id">Nama Surat</label>
                            <select name="documents_id" class="form-control" required>
                                <option value="">Pilih Surat</option>
                                @foreach($documents as $document)
                                    <option value="{{ $document->id }}">{{ $document->nama_surat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_pengaju">Nama Pengaju</label>
                            <input type="text" class="form-control" name="nama_pengaju" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_diterima">Tanggal Diterima</label>
                            <input type="date" class="form-control" name="tanggal_diterima" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
