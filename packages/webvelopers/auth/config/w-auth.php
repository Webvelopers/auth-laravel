<?php

return [

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
        'sign-up' => [
            'path' => '/auth/sign-up',
            'name' => 'auth.sign-up',
        ],
        'forget-password' => [
            'path' => '/auth/forget-password',
            'name' => 'auth.forget-password',
        ],
        'terms-and-conditions' => [
            'path' => '/auth/terms-and-conditions',
            'name' => 'auth.terms-and-conditions',
        ],
    ],

    'options' => [
        'sign-in' => [
            'remember-me' => true,
            'forget-password' => true,
            'sign-up' => true,
        ],
        'sign-up' => [
            'recaptcha' => true,
            'terms-and-conditions' => true,
            'privacy-policy' => true,
        ],
    ],

    'assets' => [
        'img' => [
            'logo' => 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg',
        ],
    ],
];
