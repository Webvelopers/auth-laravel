<?php

namespace Webvelopers\Auth\Helpers;

class Captcha
{
    /**
     * number min
     */
    const MIN = 100000;

    /**
     * number max
     */
    const MAX = 999999;

    /**
     * image path
     */
    const IMAGES_PATH = 'vendor/webvelopers/auth/images/captcha';

    /**
     * generate captcha image
     */
    public static function generateCaptchaImage(): array
    {
        $code = rand(self::MIN, self::MAX);
        $digits = str_split($code);
        $images = [];

        foreach ($digits as $digit) {
            $imagesDigit = self::IMAGES_PATH . '/' . md5($digit) . '.webp';
            $images[] = $imagesDigit;
        }

        return [
            'code' => $code,
            'images' => $images,
        ];
    }
}
