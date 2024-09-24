<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PendudukController extends Controller {

    public function index()
    {
        $penduduks = Penduduk::with('pekerjaan')->get();
        $pekerjaans = Pekerjaan::all();
        return view('penduduk.index', compact('penduduks', 'pekerjaans'));
    }

    public function create() {
        $pekerjaans = Pekerjaan::all();
        return view('penduduk.create', compact('pekerjaans'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'no_kk' => 'required|string',
            'nik' => 'required|string|unique:penduduk,nik',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'agama' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'alamat_spesifik' => 'required|string',
            'status_pendidikan' => 'required|string',
            'status_perkawinan' => 'required|string',
            'pekerjaan_id' => 'required|exists:pekerjaan,id',
        ]);
    
        Penduduk::create($request->all());
    
        return redirect()->route('penduduk.index')->with('success', 'Penduduk berhasil diciptakan Tuan! ^o^');
    }

    public function edit(Penduduk $penduduk) {
        $pekerjaans = Pekerjaan::all();
        return view('penduduk.edit', compact('penduduk', 'pekerjaans'));
    }

    public function update(Request $request, Penduduk $penduduk) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'no_kk' => 'required|string',
            'nik' => 'required|string|unique:penduduk,nik,' . $penduduk->id,
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'agama' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'alamat_spesifik' => 'required|string',
            'status_pendidikan' => 'required|string',
            'status_perkawinan' => 'required|string',
            'pekerjaan_id' => 'required|exists:pekerjaan,id',
        ]);
    
        $penduduk->update($request->all());
    
        return redirect()->route('penduduk.index')->with('success', 'Penduduk sudah diubah Tuan! ^~^');
    }

    public function destroy(Penduduk $penduduk) {
        $penduduk->delete();
        return redirect()->route('penduduk.index')->with('success', 'Penduduk telah dihapus Tuan! ^-^');
    }
}
