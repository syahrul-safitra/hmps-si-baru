<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DialogProdi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'angkatan',
        'status',
        'pesan'
    ];
}
