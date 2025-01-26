<?php

namespace Webvelopers\Auth\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordMaximal implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $max = config('w-auth.security.password.maximal.value', 32);

        if (strlen($value) > $max) {
            $fail(__('La contraseña no debe tener más de :max caracteres.', ['max' => $max]));
        }
    }
}
