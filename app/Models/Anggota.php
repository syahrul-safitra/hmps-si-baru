<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Anggota extends Authenticatable
{
    use Notifiable;

    protected $table = 'anggotas';

    protected $fillable = [
        'nama_lengkap',
        'nim',
        'no_wa',
        'tahun',
        'semester',
        'kelas',
        'file_ktm',
    ];

}