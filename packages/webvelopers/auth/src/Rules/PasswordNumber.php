<?php

namespace Webvelopers\Auth\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordNumber implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $regex = '/['.config('w-auth.security.password.number.value', '0-9').']/';

        if (! preg_match($regex, $value)) {
            $fail(__('La contraseña debe contener al menos un número.'));
        }
    }
}
