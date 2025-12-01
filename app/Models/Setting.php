<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'type'];
    public $timestamps = false; // Kita tidak butuh created_at/updated_at di sini
}
