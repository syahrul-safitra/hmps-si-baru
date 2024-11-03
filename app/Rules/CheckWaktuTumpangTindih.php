<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use App\Models\Kegiatan;

class CheckWaktuTumpangTindih implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $check = Kegiatan::where('tanggal_waktu_mulai', '<=', $value)
            ->where('tanggal_waktu_akhir', '>=', $value)->get();

        if ($check->count() != 0) {
            $fail('Waktu Tumpang Tindih, dari waktu (' . date('d-m-Y H:i', strtotime($check[0]->tanggal_waktu_mulai)) . ' hingga ' . date('d-m-Y H:i', strtotime($check[0]->tanggal_waktu_akhir)) . ' sudah terjadwal!');
        }
    }
}