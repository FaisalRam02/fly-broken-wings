@extends('adminlte::page')

@section('title', 'Manage Penduduk')

@section('css')
<style>
    .container {
        max-width: 1200px;
    }
    .modal-header {
        background-color: #007bff;
        color: white;
    }
    .modal-footer {
        background-color: #f1f1f1;
    }
    .table thead th {
        background-color: #007bff;
        color: white;
    }
    .table tbody tr:hover {
        background-color: #f9f9f9;
    }
    .alert {
        margin-top: 10px;
    }
</style>
@endsection

@section('content')
    <div class="container mt-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
            Tambah Penduduk
        </button>

        @if(session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered mt-3 table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Pekerjaan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penduduks as $index => $penduduk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $penduduk->nama }}</td>
                        <td>{{ $penduduk->nik }}</td>
                        <td>{{ $penduduk->pekerjaan->nama_pekerjaan ?? '-' }}</td>
                        <td>
                            <button class="btn btn-secondary" onclick="showPenduduk({{ $penduduk }})">
                                <i class="fas fa-eye"></i>Show
                            </button>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" 
                                onclick="editPenduduk({{ $penduduk }})">
                                <i class="fas fa-edit"></i>Edit
                            </button>
                            <form action="{{ route('penduduk.destroy', $penduduk->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('membinasakan penduduk?😨')">
                                    <i class="fas fa-trash-alt"></i>Delete
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
                <form method="POST" action="{{ route('penduduk.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambah Penduduk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="no_kk">No KK</label>
                            <input type="number" id="no_kk" name="no_kk" class="form-control" placeholder="Minimal 16 Angka" required>
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="number" id="nik" name="nik" class="form-control" placeholder="Minimal 16 Angka" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                                <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Masukan Tempat Lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="agama">agama</label>
                            <select id="agama" name="agama" class="form-control" required>
                                <option disabled selected>-- Pilih Agama --</option>
                                <option value="Tidak Beragama">Tidak Beragama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Kristen Katolik">Kristen Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input type="number" id="rt" name="rt" class="form-control" placeholder="000" maxlength="3" required pattern="\d{3}">
                        </div>
                        <div class="form-group">
                            <label for="rw">RW</label>
                            <input type="number" id="rw" name="rw" class="form-control" placeholder="000" required maxlength="3" required pattern="\d{3}">
                        </div>
                        <div class="form-group">
                            <label for="alamat_spesifik">Alamat Spesifik</label>
                            <textarea id="alamat_spesifik" name="alamat_spesifik" class="form-control" placeholder="Masukan Alamat" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status_pendidikan">Status Pendidikan</label>
                            <select id="status_pendidikan" name="status_pendidikan" class="form-control">
                                <option disabled selected>-- Pilih Status Pendidikan --</option>
                                <option value="Tidak/Belum Berpendidikan">Tidak/Belum Berpendidikan</option>
                                <option value="PAUD">PAUD</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Sarjana">Sarjana</option>
                                <option value="Magister">Magister</option>
                                <option value="Doktor">Doktor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status_perkawinan">Status Perkawinan</label>
                            <select id="status_perkawinan" name="status_perkawinan" class="form-control" required>
                                <option value="" disabled selected>Pilih Status Perkawinan</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_id">Pekerjaan</label>
                            <select id="pekerjaan_id" name="pekerjaan_id" class="form-control" requied>
                                <option value="" disabled selected>-- Pilih Pekerjaan --</option>
                                @foreach($pekerjaans as $pekerjaan)
                                    <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->nama_pekerjaan }}</option>
                                @endforeach
                            </select>
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
                        <h5 class="modal-title" id="editModalLabel">Edit Penduduk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editNama">Nama</label>
                            <input type="text" id="editNama" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="editNik">NIK</label>
                            <input type="text" id="editNik" name="nik" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="editJenisKelamin">Jenis Kelamin</label>
                            <select id="editJenisKelamin" name="jenis_kelamin" class="form-control" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editNoKk">No KK</label>
                            <input type="text" id="editNoKk" name="no_kk" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="editTanggalLahir">Tanggal Lahir</label>
                            <input type="date" id="editTanggalLahir" name="tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="editTempatLahir">Tempat Lahir</label>
                            <input type="text" id="editTempatLahir" name="tempat_lahir" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="editAgama">Agama</label>
                            <input type="text" id="editAgama" name="agama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="editRt">RT</label>
                            <input type="text" id="editRt" name="rt" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="editRw">RW</label>
                            <input type="text" id="editRw" name="rw" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="editAlamatSpesifik">Alamat Spesifik</label>
                            <textarea id="editAlamatSpesifik" name="alamat_spesifik" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editStatusPendidikan">Status Pendidikan</label>
                            <input type="text" id="editStatusPendidikan" name="status_pendidikan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="editStatusPerkawinan">Status Perkawinan</label>
                            <select id="editStatusPerkawinan" name="status_perkawinan" class="form-control">
                                <option value="" disabled selected>Pilih Status Perkawinan</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editPekerjaanId">Pekerjaan</label>
                            <select id="editPekerjaanId" name="pekerjaan_id" class="form-control">
                                @foreach ($pekerjaans as $pekerjaan)
                                    <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->nama_pekerjaan }}</option>
                                @endforeach
                            </select>
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

    <!-- Show Modal -->
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="readLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="readLabel">Detail Penduduk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table table-borderless border-right">
                                    <tr>
                                        <th>Nama</th>
                                        <td>:</td>
                                        <td id="showNama"></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>:</td>
                                        <td id="showJenisKelamin"></td>
                                    </tr>
                                    <tr>
                                        <th>NIK</th>
                                        <td>:</td>
                                        <td id="showNik"></td>
                                    </tr>
                                    <tr>
                                        <th>No KK</th>
                                        <td>:</td>
                                        <td id="showNoKk"></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td>:</td>
                                        <td id="showTanggalLahir"></td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Lahir</th>
                                        <td>:</td>
                                        <td id="showTempatLahir"></td>
                                    </tr>
                                    <tr>
                                        <th>RT</th>
                                        <td>:</td>
                                        <td id="showRt"></td>
                                    </tr>
                                    <tr>
                                        <th>RW</th>
                                        <td>:</td>
                                        <td id="showRw"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Alamat Spesifik</th>
                                        <td>:</td>
                                        <td id="showAlamatSpesifik"></td>
                                    </tr>
                                    <tr>
                                        <th>Agama</th>
                                        <td>:</td>
                                        <td id="showAgama"></td>
                                    </tr>
                                    <tr>
                                        <th>Status Perkawinan</th>
                                        <td>:</td>
                                        <td id="showStatusPerkawinan"></td>
                                    </tr>
                                    <tr>
                                        <th>Status Pendidikan</th>
                                        <td>:</td>
                                        <td id="showStatusPendidikan"></td>
                                    </tr>
                                    <tr>
                                        <th>Pekerjaan</th>
                                        <td>:</td>
                                        <td id="showPekerjaan"></td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function editPenduduk(penduduk) {
        $('#editForm').attr('action', '/penduduk/' + penduduk.id);
        $('#editNama').val(penduduk.nama);
        $('#editNik').val(penduduk.nik);
        $('#editJenisKelamin').val(penduduk.jenis_kelamin);
        $('#editNoKk').val(penduduk.no_kk);
        $('#editTanggalLahir').val(penduduk.tanggal_lahir);
        $('#editTempatLahir').val(penduduk.tempat_lahir);
        $('#editAgama').val(penduduk.agama);
        $('#editRt').val(penduduk.rt);
        $('#editRw').val(penduduk.rw);
        $('#editAlamatSpesifik').val(penduduk.alamat_spesifik);
        $('#editStatusPendidikan').val(penduduk.status_pendidikan);
        $('#editStatusPerkawinan').val(penduduk.status_perkawinan);
        $('#editPekerjaanId').val(penduduk.pekerjaan_id);
    }

    function showPenduduk(penduduk) {
        $('#showNama').text(penduduk.nama);
        $('#showNik').text(penduduk.nik);
        $('#showPekerjaan').text(penduduk.pekerjaan ? penduduk.pekerjaan.nama_pekerjaan : '-');
        $('#showJenisKelamin').text(penduduk.jenis_kelamin);
        $('#showNoKk').text(penduduk.no_kk);
        $('#showTanggalLahir').text(penduduk.tanggal_lahir);
        $('#showTempatLahir').text(penduduk.tempat_lahir);
        $('#showAgama').text(penduduk.agama);
        $('#showRt').text(penduduk.rt);
        $('#showRw').text(penduduk.rw);
        $('#showAlamatSpesifik').text(penduduk.alamat_spesifik);
        $('#showStatusPendidikan').text(penduduk.status_pendidikan);
        $('#showStatusPerkawinan').text(penduduk.status_perkawinan);
        $('#showModal').modal('show');
    }
</script>
@endsection
