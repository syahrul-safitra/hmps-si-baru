<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner1',
        'banner2',
        'banner3',
        'profile',
        'struktur',
    ];
}
