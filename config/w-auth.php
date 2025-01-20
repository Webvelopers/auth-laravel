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
        'verify-email' => [
            'path' => '/auth/verify-email',
            'name' => 'auth.verify-email',
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

    'assets' => [
        'img' => [
            'logo' => 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg',
        ],
    ],
];
