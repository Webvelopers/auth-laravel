<?php

namespace Webvelopers\Auth\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordMinimal implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $min = config('w-auth.security.password.minimal.value', 8);

        if (strlen($value) < $min) {
            $fail(__('La contraseña debe tener al menos :min caracteres.', ['min' => $min]));
        }
    }
}
