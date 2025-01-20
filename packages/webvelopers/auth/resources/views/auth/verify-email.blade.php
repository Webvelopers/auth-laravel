@extends('w-auth::layouts.guess')

@section('title', __('Forget Password'))

@section('content')
<section class="section-container">
    <div class="section-wrapper">

        {{-- Logo --}}
        <a
            href="{{ config('w-auth.route.home', '/') }}"
            class="logo-link">
            <img
                src="{{ config('w-auth.assets.img.logo', 'https://placehold.co/32x32/2563eb/fff/svg') }}"
                alt="logo"
                class="logo-image" />
            {{ config('app.name', 'Laravel') }}
        </a>
        {{-- Ends Logo --}}

        {{-- Form Forget Password --}}
        <div class="form-container">
            <div class="form-wrapper">

                {{-- Form Title --}}
                <h1 class="form-title">
                    {{ __('forget-password.title') }}
                </h1>
                {{-- Ends Form Title --}}

                {{-- Form Description --}}
                <p class="form-description">
                    {{ __('forget-password.description') }}
                </p>
                {{-- Ends Form Description --}}

                {{-- Form Content --}}
                <form
                    action="{{ route(config('w-auth.route.name.forget-password', 'auth.forget-password')) }}"
                    method="POST"
                    class="form">
                    @csrf

                    {{-- Form Input Email --}}
                    <div class="form-group">
                        <label
                            for="email"
                            class="form-label">
                            {{ __('forget-password.email') }}
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            placeholder="{{ __('forget-password.email.placeholder') }}"
                            required="on"
                            autocomplete="off"
                            class="form-input" />
                    </div>
                    {{-- Form Input Email --}}

                    {{-- Form Button Submit --}}
                    <button
                        type="submit"
                        class="submit-button">
                        {{ __('forget-password.submit') }}
                    </button>
                    {{-- Form Button Submit --}}

                    {{-- Form Footer --}}
                    <p
                        class="form-footer">
                        {{ __('forget-password.sign-in.description') }} <a
                            href="{{ url(config('w-auth.routes.sign-in.path', '/auth/sign-in')) }}"
                            class="form-footer-link">
                            {{ __('forget-password.sign-in') }}
                        </a>
                    </p>
                    <p
                        class="form-footer">
                        {{ __('forget-password.sign-up.description') }} <a
                            href="{{ url(config('w-auth.routes.sign-up.path', '/auth/sign-up')) }}"
                            class="form-footer-link">
                            {{ __('forget-password.sign-up') }}
                        </a>
                    </p>
                    {{-- Ends Form Footer --}}

                </form>
                {{-- Form Content --}}

            </div>
        </div>
        {{-- Ends Form Forget Password --}}

    </div>
</section>
@endsection