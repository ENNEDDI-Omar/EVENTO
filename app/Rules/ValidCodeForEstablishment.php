<?php

namespace App\Rules;

use App\Models\Establishment;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCodeForEstablishment implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!Establishment::where('confirmation_code', $value)->exists()){
            $fail("the confirmation code is not valide!");
        }
    }
}
