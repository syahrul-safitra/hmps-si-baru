<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kegiatan',
        'tanggal_waktu_mulai',
        'tanggal_waktu_akhir',
        'tempat',
        'deskripsi',
        'thumbnail'
    ];

    public function partisipasiKegiatan()
    {
        return $this->hasMany(PartisipasiKegiatan::class);
    }
}
