<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartisipasiKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan_id',
        'anggota_id',
        'status'
    ];

    public function partisipasi()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
