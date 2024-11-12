<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartisiPromosiKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'kode',
        'nama',
        'semester',
        'kelas',
        'no_wa',
        'status',
        'promosi_kegiatan_id'
    ];
}
