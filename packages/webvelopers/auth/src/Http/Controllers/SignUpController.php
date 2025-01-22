<?php

namespace Webvelopers\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Webvelopers\Auth\Helpers\Captcha;
use Webvelopers\Auth\Http\Requests\SignUpRequest;
use Illuminate\Support\Facades\Session;

class SignUpController extends Controller
{
    public function create()
    {
        $options = [];

        if (config('w-auth.options.sign-up.captcha')) {
            $options['captcha'] = Captcha::generateCaptcha();
        }

        return view('w-auth::auth.sign-up', ['options' => $options]);
    }

    public function store(SignUpRequest $request)
    {
        if (config('w-auth.options.sign-up.captcha')) {
            $captcha[] = [
                'captcha' => [
                    $request->input('captcha-1'),
                    $request->input('captcha-2'),
                    $request->input('captcha-3'),
                    $request->input('captcha-4'),
                    $request->input('captcha-5'),
                    $request->input('captcha-6'),
                ],
            ];

            $captcha[] = ['code' => Session::put('captcha_code')];
        }

        return $captcha;
    }
}
