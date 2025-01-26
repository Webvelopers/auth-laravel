<?php

return [

    'show' => [
        'dark-mode' => true,
        'sign-up' => true,
        'forget-password' => true,
        'verify-token' => true,

        'api' => [
            'captcha' => true,
        ],
    ],

    'security' => [

        'password' => [

            'minimal' => [
                'active' => true,
                'value' => 8,
            ],

            'maximal' => [
                'active' => true,
                'value' => 32,
            ],

            'uppercase' => [
                'active' => true,
            ],

            'lowercase' => [
                'active' => true,
            ],

            'number' => [
                'active' => true,
            ],

            'symbol' => [
                'active' => true,
                'value' => '|~\^_`<>{}[]()',
            ],

        ],
    ],

    'options' => [

        'sign-in' => [
            'remember-me' => true,
            'forget-password' => true,
            'sign-up' => true,
        ],

        'sign-up' => [
            'confirm-password' => true,
            'captcha' => true,
            'terms-and-conditions' => true,
            'privacy-policy' => true,
            'sign-in' => true,
        ],

        'forget-password' => [
            'sign-in' => true,
            'sign-up' => true,
        ],
    ],

    'routes' => [

        'home' => [
            'path' => '/',
            'index' => 'auth.home',
        ],

        'dashboard' => [
            'path' => '/dashboard',
            'index' => 'auth.dashboard',
        ],

        'sign-in' => [
            'path' => '/auth/sign-in',
            'create' => 'auth.sign-in.create',
            'store' => 'auth.sign-in.store',
        ],

        'sign-up' => [
            'path' => '/auth/sign-up',
            'create' => 'auth.sign-up.create',
            'store' => 'auth.sign-up.store',
        ],

        'forget-password' => [
            'path' => '/auth/forget-password',
            'create' => 'auth.forget-password.create',
            'store' => 'auth.forget-password.store',
        ],

        'verify-email' => [
            'path' => '/auth/verify-email',
            'create' => 'auth.verify-email.create',
            'store' => 'auth.verify-email.store',
        ],

        'terms-and-conditions' => [
            'path' => '/auth/terms-and-conditions',
            'index' => 'auth.terms-and-conditions',
        ],

        'privacy-policy' => [
            'path' => '/auth/privacy-policy',
            'index' => 'auth.privacy-policy',
        ],

        'api' => [
            'captcha' => [
                'path' => '/auth/api/captcha',
                'invoke' => 'auth.api.captcha',
            ],
        ],
    ],

    'assets' => [

        'img' => [
            'logo' => 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg',
        ],

    ],
];
