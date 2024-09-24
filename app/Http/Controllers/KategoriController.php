<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate(['nama_kategori' => 'required']);
        Kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diciptakan Tuan! ^o^');
    }
    
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate(['nama_kategori' => 'required']);
        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori sudah diubah Tuan! ^~^');
    }
    
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori telah dihapus Tuan! ^-^');
    }      
}
