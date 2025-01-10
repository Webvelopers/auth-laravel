@extends('webvelopers-auth::layouts.guess')

@section('title', __('Sign In'))

@section('script')
<script>
    tailwind.config = {
        darkMode: 'class',
        theme: {
            extend: {
                colors: {
                    primary: {
                        "50": "#eff6ff",
                        "100": "#dbeafe",
                        "200": "#bfdbfe",
                        "300": "#93c5fd",
                        "400": "#60a5fa",
                        "500": "#3b82f6",
                        "600": "#2563eb",
                        "700": "#1d4ed8",
                        "800": "#1e40af",
                        "900": "#1e3a8a",
                        "950": "#172554"
                    }
                }
            },
            fontFamily: {
                'body': [
                    'Inter',
                    'ui-sans-serif',
                    'system-ui',
                    '-apple-system',
                    'system-ui',
                    'Segoe UI',
                    'Roboto',
                    'Helvetica Neue',
                    'Arial',
                    'Noto Sans',
                    'sans-serif',
                    'Apple Color Emoji',
                    'Segoe UI Emoji',
                    'Segoe UI Symbol',
                    'Noto Color Emoji'
                ],
                'sans': [
                    'Inter',
                    'ui-sans-serif',
                    'system-ui',
                    '-apple-system',
                    'system-ui',
                    'Segoe UI',
                    'Roboto',
                    'Helvetica Neue',
                    'Arial',
                    'Noto Sans',
                    'sans-serif',
                    'Apple Color Emoji',
                    'Segoe UI Emoji',
                    'Segoe UI Symbol',
                    'Noto Color Emoji'
                ]
            }
        }
    }
</script>
@endsection

@section('content')
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

        {{-- Logo --}}
        <a
            href="{{ route('home') }}"
            class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img
                src="{{ config('webvelopers-auth.assets.img.logo', 'https://placehold.co/32x32/2563eb/fff/svg') }}"
                class="w-8 h-8 mr-2"
                alt="logo">
            {{ config('app.name', 'Laravel') }}
        </a>
        {{-- Ends Logo --}}

        {{-- Form --}}
        <div class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">

            {{-- Form Title --}}
            <h1 class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                {{ __('Log in to your account') }}
            </h1>
            {{-- Ends Form Title --}}

            {{-- Form Description --}}
            <p class="font-light text-gray-500 dark:text-gray-400">
                {{ __('Enter your credentials to access your account.') }}
            </p>
            {{-- Ends Form Description --}}

            <form method="POST" action="{{ route('sign-in.store') }}" class="space-y-4 md:space-y-6">
                @csrf

                {{-- Form Input Email --}}
                <div>
                    <label
                        for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('Email') }}
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="{{ __('user@mail.com') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        autocomplete="off"
                        required="" />
                </div>
                {{-- Ends Form Input Email --}}

                {{-- Form Input Password --}}
                <div>
                    <label
                        for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('Password') }}
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        autocomplete="off"
                        required="" />
                </div>
                {{-- Ends Form Input Password --}}


                <div class="flex items-center justify-between">

                    @if (config('webvelopers-auth.sign-in.remember-me'))
                    <div class="flex items-start">

                        {{-- Form Input Checkbox --}}
                        <div class="flex items-center h-5">
                            <input
                                type="checkbox"
                                name="remember"
                                id="remember"
                                aria-describedby="remember"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" />
                        </div>
                        <div class="ml-3 text-sm">
                            <label
                                for="remember"
                                class="text-gray-500 dark:text-gray-300">
                                {{ __('Remember me') }}
                            </label>
                        </div>
                        {{-- Ends Form Input Checkbox --}}

                    </div>
                    @endif

                    @if (config('webvelopers-auth.sign-in.forget-password'))
                    <a
                        href="{{ route('forget-password.create') }}"
                        class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">
                        {{ __('Forgot password?') }}
                    </a>
                    @endif
                </div>

                {{-- Form Button Submit --}}
                <button
                    type="submit"
                    class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    {{ __('Sign In') }}
                </button>
                {{-- Ends Form Button Submit --}}

                @if (config('webvelopers-auth.sign-in.sign-up'))
                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                    {{ __('Don\'t have an account yet?') }} <a
                        href="{{ route('sign-up.create') }}"
                        class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                        {{ __('Sign Up') }}
                    </a>
                </p>
                @endif
            </form>
        </div>
        {{-- Ends Form --}}
    </div>
</section>
@endsection