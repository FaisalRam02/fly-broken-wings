<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Kategori;
use App\Models\Penduduk;
use App\Models\Surat;
use Illuminate\Http\Request;

class RumahController extends Controller
{
    public function index()
{
    // Fetch all documents
    $documents = Document::all();
    
    // Fetch all surats with their associated documents
    $surat = Surat::with('document')->get();

    return view('rumah.index', compact('documents', 'surat'));
}

}
