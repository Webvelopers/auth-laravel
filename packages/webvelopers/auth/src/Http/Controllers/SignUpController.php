<?php

namespace Webvelopers\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Webvelopers\Auth\Helpers\Captcha;
use Webvelopers\Auth\Rules\PasswordLowercase;
use Webvelopers\Auth\Rules\PasswordMaximal;
use Webvelopers\Auth\Rules\PasswordMinimal;
use Webvelopers\Auth\Rules\PasswordNumber;
use Webvelopers\Auth\Rules\PasswordSymbol;
use Webvelopers\Auth\Rules\PasswordUppercase;

class SignUpController extends Controller
{
    public function create()
    {
        $options = [];

        if (config('w-auth.options.sign-up.captcha')) {
            $options['captcha'] = Captcha::generateCaptcha(
                config('w-auth.show.dark-mode', true)
            );
            $options['captcha']['code'] = Hash::make($options['captcha']['code']);
        }

        return view('w-auth::auth.sign-up', ['options' => $options]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
        ];

        $messages = [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe tener más de :max caracteres.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de texto.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.max' => 'El correo electrónico no debe tener más de :max caracteres.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
        ];

        if (config('w-auth.security.password.minimal.active', true)) {
            $rules['password'][] = new PasswordMinimal;
        }

        if (config('w-auth.security.password.maximal.active', true)) {
            $rules['password'][] = new PasswordMaximal;
        }

        if (config('w-auth.security.password.require-uppercase.active', true)) {
            $rules['password'][] = new PasswordUppercase;
        }

        if (config('w-auth.security.password.require-lowercase.active', true)) {
            $rules['password'][] = new PasswordLowercase;
        }

        if (config('w-auth.security.password.require-number.active', true)) {
            $rules['password'][] = new PasswordNumber;
        }

        if (config('w-auth.security.password.require-symbols.active', true)) {
            $rules['password'][] = new PasswordSymbol;
        }

        if (config('w-auth.options.sign-up.captcha', true)) {
            $rules['hashedcaptcha'] = ['required'];

            $messages['hashedcaptcha.required'] = 'El campo hashedcaptcha es obligatorio.';

            $rules = array_merge(
                $rules,
                collect(range(1, 6))
                    ->mapWithKeys(fn ($i) => ["captcha-$i" => ['required', 'integer']])
                    ->toArray()
            );

            $messages = array_merge(
                $messages,
                collect(range(1, 6))
                    ->mapWithKeys(fn ($i) => ["captcha-$i.required" => "El campo captcha-$i es obligatorio."])
                    ->toArray()
            );
        }

        if (config('w-auth.options.sign-up.terms', true)) {
            $rules['terms'] = ['required'];

            $messages['terms.required'] = 'El campo términos y condiciones es obligatorio.';
        }

        if (config('w-auth.options.sign-up.policy', true)) {
            $rules['policy'] = ['required'];

            $messages['policy.required'] = 'El campo política de privacidad es obligatorio.';
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            dd([
                'rules' => $rules,
                'messages' => $messages,
                'data' => $request->all(),
                'errors' => $validator->errors(),
            ]);

            return view('w-auth::auth.sign-up', [
                'emssages' => $validator->errors(),
            ]);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        if (config('w-auth.show.verify-token', true)) {
            // https://laravel.com/docs/11.x/verification#the-email-verification-handler
            $data['verification_token'] = Str::random(60);
        }

        if (config('w-auth.options.sign-up.captcha')) {
            $code = collect(range(1, 6))
                ->map(fn ($i) => $request->input("captcha-$i"))
                ->implode('');

            if (Hash::check($code, $request->hashedcaptcha)) {
                $user = User::create($data);
                $user->save();
            }
        }

        // 3. Enviar el correo electrónico de verificación
        // Mail::to($user->email)->send(new \App\Mail\VerifyEmail($user));

        // 4. Redirigir al usuario a una página de éxito
        // return redirect()->route('registration.success');

        return [];
    }
}
