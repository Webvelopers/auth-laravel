<?php

namespace Webvelopers\Auth\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Webvelopers\Auth\Helpers\Captcha;

class CaptchaController extends Controller
{
    public function __invoke()
    {
        $captcha = Captcha::generateCaptcha();

        return response()->json([$captcha]);
    }
}
