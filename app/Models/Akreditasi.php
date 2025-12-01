<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akreditasi extends Model
{
    use HasFactory;

    protected $table = 'akreditasis';

    // PASTIKAN SEMUA KOLOM INI ADA:
   protected $fillable = [
    'judul',
    'peringkat',
    'tahun',
    'status', // <--- TAMBAHKAN INI
    'file_sertifikat',
    'deskripsi'
];
}