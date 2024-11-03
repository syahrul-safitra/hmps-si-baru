<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckWaktuAkhirKegiatanMinimal implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    private $waktu_mulai;

    public function __construct($data)
    {
        $this->waktu_mulai = $data;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $waktu_mulai_kegiatan = new \DateTime($this->waktu_mulai, new \DateTimeZone('Asia/Jakarta'));

        $waktu_mulai_kegiatan->modify('+1 hours');

        $waktu_akhir_kegiatan = new \DateTime($value, new \DateTimeZone('Asia/Jakarta'));

        if ($waktu_akhir_kegiatan < $waktu_mulai_kegiatan) {
            $fail('Mauskan waktu akhir lebih dari 1 jam dari waktu mulai');
        }
    }
}
