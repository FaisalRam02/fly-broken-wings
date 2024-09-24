<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surats';

    protected $fillable = ['documents_id', 'nama_pengaju', 'tanggal_diterima', 'status'];

    public function document()
    {
        return $this->belongsTo(Document::class, 'documents_id');
    }
}
