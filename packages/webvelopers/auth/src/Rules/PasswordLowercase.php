<?php

namespace Webvelopers\Auth\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordLowercase implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $regex = '/['.config('w-auth.security.password.lowercase.value', 'a-z').']/';

        if (! preg_match($regex, $value)) {
            $fail(__('La contraseña debe contener al menos una letra minúscula.'));
        }
    }
}
