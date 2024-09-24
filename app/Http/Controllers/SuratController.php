<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Penduduk;
use App\Models\Surat;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class SuratController extends Controller
{
    public function index()
    {
        $surats = Surat::with('document')->get();
        $documents = Document::all();
        return view('surat.index', compact('surats', 'documents'));
    }   

    public function store(Request $request)
    {
        $request->validate([
            'documents_id' => 'required',
            'nama_pengaju' => 'required|string|max:255|exists:penduduk,nama',
            'tanggal_diterima' => 'required|date',
        ], [
            'nama_pengaju.exists' => 'Nama pengaju tidak ditemukan di tabel penduduk.',
        ]);
    
        Surat::create($request->all());
        return redirect()->route('surat.index')->with('success', 'Surat created successfully');
    }

    public function update(Request $request, Surat $surat)
    {
        $request->validate([
            'documents_id' => 'required',
            'nama_pengaju' => 'required|string|max:255|exists:penduduk,nama',
            'tanggal_diterima' => 'required|date',
        ], [
            'nama_pengaju.exists' => 'Nama pengaju tidak ditemukan di tabel penduduk.',
        ]);
    
        $surat->update($request->all());
        return redirect()->route('surat.index')->with('success', 'Surat updated successfully');
    }

    public function destroy(Surat $surat)
    {
        $surat->delete();
        return redirect()->route('surat.index')->with('success', 'Surat deleted successfully');
    }

    public function updateStatus($id, $status)
    {
        $surat = Surat::findOrFail($id);
        $surat->status = $status;
        $surat->save();

        return redirect()->route('surat.index')->with('success', 'Status updated successfully!');
    }

    public function printPdf($id)
    {
        // Find the Surat model with its related JenisSurat model
        $surat = Surat::with('document')->find($id); 
        $penduduk = Penduduk::where('nama', $surat->nama_pengaju)
        ->where('nama', $surat->nama_pengaju)
        ->first();

    // Check if Penduduk is found
    if (!$penduduk) {
        return redirect()->back()->with('error', 'Penduduk tidak ditemukan.');
    }
    
        // Check if Surat or JenisSurat is not found
        if (!$surat || !$surat->document) {
            return redirect()->back()->with('error', 'Surat atau jenis surat tidak ditemukan.');
        }
    
        // Determine the type of surat and generate the PDF
        switch ($surat->document->nama_surat) {
            case 'Surat Keterangan Domisili':
                $pdf = PDF::loadView('surat.domisili', compact('surat', 'penduduk'));
                return $pdf->stream('Surat_Keterangan_Domisili.pdf'); // Display in browser
            case 'Surat Keterangan Kematian':
                $pdf = PDF::loadView('surat.kematian', compact('surat', 'penduduk'));
                return $pdf->stream('Surat_Keterangan_Kematian.pdf'); // Display in browser
            case 'Surat Keterangan Usaha':
                $pdf = PDF::loadView('surat.usaha', compact('surat', 'penduduk'));
                return $pdf->stream('Surat_Keterangan_Usaha.pdf'); // Display in browser
            case 'Surat Keterangan Kelakuan Baik':
                $pdf = PDF::loadView('surat.kelakuan_baik', compact('surat', 'penduduk'));
                return $pdf->stream('Surat_Keterangan_Kelakuan_Baik.pdf'); // Display in browser
            case 'Surat Keterangan Tidak Mampu':
                $pdf = PDF::loadView('surat.tidak_mampu', compact('surat', 'penduduk'));
                return $pdf->stream('Surat_Keterangan_Tidak_Mampu.pdf'); // Display in browser
            default:
                return redirect()->back()->with('error', 'Jenis surat tidak dikenal.');
        }
}
}