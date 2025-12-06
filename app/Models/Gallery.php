<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    // Kita ganti guarded dengan fillable agar lebih aman dan spesifik
    protected $fillable = [
        'title',
        'image',
        'caption',
        'status', // <--- Kolom status dimasukkan di sini
    ];
}