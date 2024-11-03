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
        'email',
        'nim',
        'no_wa',
        'tahun',
        'semester',
        'kelas',
        'file_ktm',
        'password'
    ];

    public function partisipasiKegiatan()
    {
        return $this->hasMany(PartisipasiKegiatan::class);
    }

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'password' => 'hashed'
    ];

}
