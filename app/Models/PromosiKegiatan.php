<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PartisiPromosiKegiatan;

class PromosiKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kegiatan',
        'tanggal',
        'tempat',
        'deskripsi',
        'thumbnail'
    ];

    public function scopeFilter($query, $serach)
    {
        $query->when($serach ?? false, function ($query, $search) {
            return $query->where('nama_kegiatan', 'LIKE', '%' . $search . '%');
        });
    }

    public function partisipasiPromoKegiatan()
    {
        return $this->hasMany(PartisiPromosiKegiatan::class, 'promosi_kegiatan_id', 'id');
    }
}
