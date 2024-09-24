<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    public function index()
    {
        $pekerjaans = Pekerjaan::all();
        return view('pekerjaan.index', compact('pekerjaans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pekerjaan' => 'required|string|max:255',
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => $request->nama_pekerjaan,
        ]);

        return redirect()->route('pekerjaan.index')->with('success', 'Apakah Tuan membuka lowongan pekerjaan? 0o0');
    }

    public function update(Request $request, Pekerjaan $pekerjaan)
    {
        $request->validate([
            'nama_pekerjaan' => 'required|string|max:255',
        ]);

        $pekerjaan->update([
            'nama_pekerjaan' => $request->nama_pekerjaan,
        ]);

        return redirect()->route('pekerjaan.index')->with('success', 'Pekerjaan sudah diubah Tuan! ^~^');
    }

    public function destroy(Pekerjaan $pekerjaan)
    {
        $pekerjaan->delete();
        return redirect()->route('pekerjaan.index')->with('success', 'Pekerjaan teah dihapus Tuan! ^-^');
    }
}
