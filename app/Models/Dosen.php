<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    // Izinkan semua kolom diisi (mass assignment)
    protected $guarded = ['id'];

    // Otomatis ubah JSON di database jadi Array di PHP
    protected $casts = [
        'social_links' => 'array',
    ];
}
