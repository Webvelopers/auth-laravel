<?php

namespace Webvelopers\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{
    protected $redirect = '/auth/sign-up';

    public function authorize(): bool
    {
        return config('w-auth.security.sign-up.active', true);
    }

    public function rules(): array
    {
        $password_rules = ['required'];

        if (config('w-auth.security.password.min-length.active', true)) {
            $value = config('w-auth.security.password.min-length.value', 8);
            array_merge($password_rules, ['min:' . $value]);
        }

        if (config('w-auth.security.password.max-length.active', true)) {
            $value = config('w-auth.security.password.max-length.value', 32);
            array_merge($password_rules, ['max:' . $value]);
        }

        if (config('w-auth.security.password.max-symbols.active', true)) {
            array_merge($password_rules, ['regex:/[' . config('w-auth.security.password.max-symbols.value', '@$!%*#?&') . ']/']);
        }

        if (config('w-auth.security.password.require-uppercase', true)) {
            array_merge($password_rules, ['regex:/[A-Z]/']);
        }

        if (config('w-auth.security.password.require-lowercase', true)) {
            array_merge($password_rules, ['regex:/[a-z]/']);
        }

        if (config('w-auth.security.password.require-numbers', true)) {
            array_merge($password_rules, ['regex:/[0-9]/']);
        }

        $rules = [
            'email' => 'required|email',
            'password' => $password_rules,
        ];

        if (config('w-auth.options.sign-up.confirm-password')) {
            array_merge($rules, [
                'confirm-password' => 'required|same:password',
            ]);
        }

        if (config('w-auth.options.sign-up.captcha', true)) {
            array_merge($rules, [
                'captcha-1' => 'required|integer',
                'captcha-2' => 'required|integer',
                'captcha-3' => 'required|integer',
                'captcha-4' => 'required|integer',
                'captcha-5' => 'required|integer',
                'captcha-6' => 'required|integer',
            ]);
        }

        if (config('w-auth.options.sign-up.terms', true)) {
            array_merge($rules, [
                'terms' => 'required',
            ]);
        }

        if (config('w-auth.options.sign-up.policy', true)) {
            array_merge($rules, [
                'policy' => 'required',
            ]);
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'email.required' => __('sign-up.email.validation.required'),
            'email.email' => __('sign-up.email.validation.email'),
            'password.required' => __('sign-up.password.validation.required'),
            'password.min' => __('sign-up.password.validation.min'),
            'password.max' => __('sign-up.password.validation.max'),
            'password.regex' => __('sign-up.password.validation.regex'),
            'confirm-password.required' => __('sign-up.confirm-password.validation.required'),
            'confirm-password.same' => __('sign-up.confirm-password.validation.same'),
            'captcha-1.required' => __('sign-up.captcha.validation.required'),
            'captcha-1.integer' => __('sign-up.captcha.validation.integer'),
            'captcha-2.required' => __('sign-up.captcha.validation.required'),
            'captcha-2.integer' => __('sign-up.captcha.validation.integer'),
            'captcha-3.required' => __('sign-up.captcha.validation.required'),
            'captcha-3.integer' => __('sign-up.captcha.validation.integer'),
            'captcha-4.required' => __('sign-up.captcha.validation.required'),
            'captcha-4.integer' => __('sign-up.captcha.validation.integer'),
            'captcha-5.required' => __('sign-up.captcha.validation.required'),
            'captcha-5.integer' => __('sign-up.captcha.validation.integer'),
            'captcha-6.required' => __('sign-up.captcha.validation.required'),
            'captcha-6.integer' => __('sign-up.captcha.validation.integer'),
            'terms.required' => __('sign-up.terms.validation.required'),
            'policy.required' => __('sign-up.policy.validation.required'),
        ];
    }
}
