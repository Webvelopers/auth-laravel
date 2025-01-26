<?php

namespace Webvelopers\Auth\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordUppercase implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $regex = '/['.config('w-auth.security.password.uppercase.value', 'A-Z').']/';

        if (! preg_match($regex, $value)) {
            $fail(__('La contraseña debe contener al menos una letra mayúscula.'));
        }
    }
}
