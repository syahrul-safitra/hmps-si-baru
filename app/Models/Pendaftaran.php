<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'email',
        'nim',
        'no_wa',
        'tahun',
        'semester',
        'kelas',
        'file_ukt',
        'file_ktm',
        'file_cv',
        'file_srt_penyataan',
        'file_ss_instagram',
        'status',
    ];
}
