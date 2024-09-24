<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Kategori;
use App\Models\Penduduk;

class RumahController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('rumah.index', compact('documents'));
    }
}
