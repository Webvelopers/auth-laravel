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
                    {{ __('sign-in.title') }}
                </h1>
                {{-- Ends Form Title --}}

                {{-- Form Description --}}
                <p class="form-description">
                    {{ __('sign-in.description') }}
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
                            {{ __('sign-in.email') }}
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            placeholder="{{ __('sign-in.email.placeholder') }}"
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
                            {{ __('sign-in.password') }}
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
                                    {{ __('sign-in.remember-me') }}
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
                            {{ __('sign-in.forgot-password') }}
                        </a>
                        @endif
                        {{-- Ends Forget Password --}}

                    </div>
                    {{-- Form Options --}}

                    {{-- Form Button Submit --}}
                    <button
                        type="submit"
                        class="submit-button">
                        {{ __('sign-in.submit') }}
                    </button>
                    {{-- Ends Form Button Submit --}}

                    {{-- Sign Up --}}
                    @if (config('w-auth.options.sign-in.sign-up'))
                    <p class="form-footer">
                        {{ __('sign-in.sign-up.description') }}
                        <a
                            href="{{ route(config('w-auth.routes.sign-up.name', 'auth.sign-in')) }}"
                            class="form-footer-link">
                            {{ __('sign-in.sign-up') }}
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