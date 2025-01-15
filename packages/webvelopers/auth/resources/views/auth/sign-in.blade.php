@extends('webvelopers-auth::layouts.guess')

@section('title', __('Sign In'))

@section('content')
<section class="main-container">
    <div class="content-wrapper">

        {{-- Logo --}}
        <a
            href="{{ route('home') }}"
            class="logo-link">
            <img
                src="{{ config('webvelopers-auth.assets.img.logo', 'https://placehold.co/32x32/2563eb/fff/svg') }}"
                alt="logo"
                class="logo-image">
            {{ config('app.name', 'Laravel') }}
        </a>
        {{-- Ends Logo --}}

        {{-- Form --}}
        <div class="form-container">
            <div class="form-wrapper">

                {{-- Form Title --}}
                <h1 class="form-title">
                    {{ __('Log in to your account') }}
                </h1>
                {{-- Ends Form Title --}}

                {{-- Form Description --}}
                <p class="form-description">
                    {{ __('Enter your credentials to access your account.') }}
                </p>
                {{-- Ends Form Description --}}

                <form
                    action="{{ route('sign-in.store') }}"
                    method="POST"
                    class="form">
                    @csrf

                    {{-- Form Input Email --}}
                    <div class="form-group">
                        <label
                            for="email"
                            class="form-label">
                            {{ __('Email') }}
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            placeholder="{{ __('user@mail.com') }}"
                            autocomplete="off"
                            required=""
                            class="form-input" />
                    </div>
                    {{-- Ends Form Input Email --}}

                    {{-- Form Input Password --}}
                    <div>
                        <label
                            for="password"
                            class="form-label">
                            {{ __('Password') }}
                        </label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="••••••••"
                            autocomplete="off"
                            required=""
                            class="form-input" />
                    </div>
                    {{-- Ends Form Input Password --}}


                    <div class="form-options">

                        @if (config('webvelopers-auth.sign-in.remember-me'))
                        <div class="remember-me">

                            {{-- Form Input Checkbox --}}
                            <div class="remember-me-wrapper">
                                <input
                                    type="checkbox"
                                    name="remember"
                                    id="remember"
                                    aria-describedby="remember"
                                    class="remember-me-input" />
                            </div>
                            <div class="remember-me-text">
                                <label
                                    for="remember"
                                    class="remember-me-label">
                                    {{ __('Remember me') }}
                                </label>
                            </div>
                            {{-- Ends Form Input Checkbox --}}

                        </div>
                        @endif

                        @if (config('webvelopers-auth.sign-in.forget-password'))
                        <a
                            href="{{ route('forget-password.create') }}"
                            class="forget-password-link">
                            {{ __('Forgot password?') }}
                        </a>
                        @endif
                    </div>

                    {{-- Form Button Submit --}}
                    <button
                        type="submit"
                        class="submit-button">
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
        </div>
        {{-- Ends Form --}}
    </div>
</section>
@endsection