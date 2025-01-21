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
            'name' => 'auth.home',
        ],
        'dashboard' => [
            'path' => '/dashboard',
            'name' => 'auth.dashboard',
        ],
        'sign-in' => [
            'path' => '/auth/sign-in',
            'name' => 'auth.sign-in',
        ],
        'sign-in.store' => [
            'path' => '/auth/sign-in',
            'name' => 'auth.sign-in.store',
        ],
        'sign-up' => [
            'path' => '/auth/sign-up',
            'name' => 'auth.sign-up',
        ],
        'sign-up.store' => [
            'path' => '/auth/sign-up',
            'name' => 'auth.sign-up.store',
        ],
        'forget-password' => [
            'path' => '/auth/forget-password',
            'name' => 'auth.forget-password',
        ],
        'forget-password.store' => [
            'path' => '/auth/forget-password',
            'name' => 'auth.forget-password.store',
        ],
        'verify-email' => [
            'path' => '/auth/verify-email',
            'name' => 'auth.verify-email',
        ],
        'verify-email.store' => [
            'path' => '/auth/verify-email',
            'name' => 'auth.verify-email.store',
        ],
        'terms-and-conditions' => [
            'path' => '/auth/terms-and-conditions',
            'name' => 'auth.terms-and-conditions',
        ],
        'privacy-policy' => [
            'path' => '/auth/privacy-policy',
            'name' => 'auth.privacy-policy',
        ],
    ],

    'assets' => [
        'img' => [
            'logo' => 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg',
        ],
    ],
];
