<?php

return [

    'routes' => [
        'home' => '/',
        'sign-in' => '/auth/sign-in',
        'sign-up' => '/auth/sign-up',
        'forget-password' => '/auth/forget-password',
    ],

    'assets' => [

        'img' => [
            'logo' => 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg',
        ],

    ],

    'sign-in' => [
        'remember-me' => true,
        'forget-password' => true,
        'sign-up' => true,
    ],

    'sign-up' => [
        'terms-and-conditions' => true,
        'privacy-policy' => true,
    ],

];
