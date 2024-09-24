<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('kategori')->get(); 
        $kategori = Kategori::all();
        
        return view('documents.index', compact('documents', 'kategori'));
    }

    public function create()
    {
        
        $kategori = Kategori::all();
        return view('documents.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        Document::create([
            'nama_surat' => $request->nama_surat,
            'kategori_id' => $request->kategori_id,
        ]);
        
        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil ditambahkan!');
    }

    public function edit(Document $document)
    {
        $kategori = Kategori::all();
        return view('documents.edit', compact('document', 'kategori'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'nama_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $document->update($request->all());
        
        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diubah!');
    }

    public function destroy(Document $document)
    {
        $document->delete();
        
        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil dihapus!');
    }
}
