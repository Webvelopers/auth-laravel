<?php

namespace Webvelopers\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Webvelopers\Auth\Helpers\Captcha;
use Webvelopers\Auth\Http\Requests\SignUpRequest;

class SignUpController extends Controller
{
    public function create()
    {
        $options = [];

        if (config('w-auth.options.sign-up.captcha')) {
            $captcha = Captcha::generateCaptchaImage();
            session('captcha', $captcha['code']);
            $options['captcha'] = $captcha['images'];
        }

        return view('w-auth::auth.sign-up', ['options' => $options]);
    }

    public function store(SignUpRequest $request)
    {
        return $request->all();
    }
}
