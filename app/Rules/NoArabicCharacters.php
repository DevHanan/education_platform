<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoArabicCharacters implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Arabic characters Unicode range
        if (preg_match('/[\p{Arabic}]/u', $value)) {
            $fail('The ' . $attribute . ' field cannot contain Arabic characters.');
    }
}
}
