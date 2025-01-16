@extends('w-auth::layouts.guess')

@section('title', __('Sign In'))

@section('content')
<section class="section-container">
    <div class="section-wrapper">

        {{-- Logo --}}
        <a
            href="{{ url(config('w-auth.routes.home.path', '/')) }}"
            class="logo-link">
            <img
                src="{{ config('w-auth.assets.img.logo', 'https://placehold.co/32x32/2563eb/fff/svg') }}"
                alt="logo"
                class="logo-image" />
            {{ config('app.name', 'Laravel') }}
        </a>
        {{-- Ends Logo --}}

        {{-- Form --}}
        <div class="form-container">
            <div class="form-wrapper">

                {{-- Form Title --}}
                <h1 class="form-title">
                    {{ __('Welcome Back!') }}
                </h1>
                {{-- Ends Form Title --}}

                {{-- Form Description --}}
                <p class="form-description">
                    {{ __('Sign in to your account to continue.') }}
                </p>
                {{-- Ends Form Description --}}

                {{-- Form Content --}}
                <form
                    action="{{ route(config('w-auth.routes.name.sign-in', 'auth.sign-in')) }}"
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
                            placeholder="{{ __('user@email.com') }}"
                            required="on"
                            autocomplete="off"
                            class="form-input" />
                    </div>
                    {{-- Ends Form Input Email --}}

                    {{-- Form Input Password --}}
                    <div class="form-group">
                        <label
                            for="password"
                            class="form-label">
                            {{ __('Password') }}
                        </label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="••••••••••••"
                            required="on"
                            autocomplete="off"
                            class="form-input" />
                    </div>
                    {{-- Ends Form Input Password --}}

                    {{-- Form Options --}}
                    <div class="form-options">

                        {{-- Remember Me --}}
                        @if (config('w-auth.options.sign-in.remember-me'))
                        <div class="checkbox">

                            {{-- Form Input Checkbox --}}
                            <div class="checkbox-wrapper">
                                <input
                                    type="checkbox"
                                    name="remember"
                                    id="remember"
                                    aria-describedby="remember"
                                    class="remember-me-input" />
                            </div>
                            <div class="checkbox-text">
                                <label
                                    for="remember"
                                    class="checkbox-label">
                                    {{ __('Remember me') }}
                                </label>
                            </div>
                            {{-- Ends Form Input Checkbox --}}

                        </div>
                        @endif
                        {{-- Ends Remember Me --}}

                        {{-- Forget Password --}}
                        @if (config('w-auth.options.sign-in.forget-password'))
                        <a
                            href="{{ route(config('w-auth.routes.name.forget-password', 'auth.forget-password')) }}"
                            class="forget-password-link">
                            {{ __('Forgot password?') }}
                        </a>
                        @endif
                        {{-- Ends Forget Password --}}
                    </div>
                    {{-- Form Options --}}

                    {{-- Form Button Submit --}}
                    <button
                        type="submit"
                        class="submit-button">
                        {{ __('Sign In') }}
                    </button>
                    {{-- Ends Form Button Submit --}}

                    {{-- Sign Up --}}
                    @if (config('w-auth.options.sign-in.sign-up'))
                    <p class="form-footer">
                        {{ __('Don\'t have an account yet?') }}
                        <a
                            href="{{ route(config('w-auth.routes.sign-up.name', 'auth.sign-in')) }}"
                            class="form-footer-link">
                            {{ __('Sign Up') }}
                        </a>
                    </p>
                    @endif
                    {{-- Ends Sign Up --}}
                </form>
                {{-- Ends Form Content --}}
            </div>
        </div>
        {{-- Ends Form --}}
    </div>
</section>
@endsection