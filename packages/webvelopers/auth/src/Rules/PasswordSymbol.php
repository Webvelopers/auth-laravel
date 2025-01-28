<?php

namespace Webvelopers\Auth\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordSymbol implements ValidationRule
{
    protected string $symbol = '/[|~\^_`<>{}[]();]+/';

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $symbol = config('w-auth.security.password.symbol.value', $this->symbol);
        $regex = $symbol;

        if (! preg_match($regex, $value)) {
            $fail(__('La contraseña debe contener al menos un símbolo como: :symbol', ['symbol' => $symbol]));
        }
    }
}
