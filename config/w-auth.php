<?php

return [

    'show' => [
        'sign-up' => true,
        'forget-password' => true,
    ],

    'security' => [

        'password' => [

            'min-length' => [
                'active' => true,
                'value' => 8,
            ],

            'max-length' => [
                'active' => true,
                'value' => 32,
            ],

            'require-symbols' => [
                'active' => true,
                'value' => '@$!%*#?&',
            ],

            'require-uppercase' => [
                'active' => true,
            ],

            'require-lowercase' => [
                'active' => true,
            ],

            'require-numbers' => [
                'active' => true,
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
    ],

    'assets' => [
        'img' => [
            'logo' => 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg',
        ],
    ],
];
