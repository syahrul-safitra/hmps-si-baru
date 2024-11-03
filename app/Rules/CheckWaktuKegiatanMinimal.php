<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckWaktuKegiatanMinimal implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // ketika waktu yang di input kurang dari 3 jam dari sekarang :

        $waktu_yang_diinput = new \DateTime($value, new \DateTimeZone('Asia/Jakarta'));

        $waktu_sekarang = new \DateTime('now', new \DateTimeZone('Asia/Jakarta'));
        $waktu_sekarang->modify('+3 hours');

        if ($waktu_yang_diinput < $waktu_sekarang) {
            $fail('Masukan waktu minimal 3 jam kedepan!');
        }

    }
}
