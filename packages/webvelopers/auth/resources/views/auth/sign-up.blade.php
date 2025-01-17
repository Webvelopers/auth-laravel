@extends('w-auth::layouts.guess')

@section('title', __('Sign Up'))

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
                class="logo-image">
            {{ config('app.name', 'Laravel') }}
        </a>
        {{-- Ends Logo --}}

        {{-- Form --}}
        <div class="form-container">
            <div class="form-wrapper">

                {{-- Form Title --}}
                <h1 class="form-title">
                    {{ __('sign-up.title') }}
                </h1>
                {{-- Ends Form Title --}}

                {{-- Form Description --}}
                <p class="form-description">
                    {{ __('sign-up.description') }}
                </p>
                {{-- Ends Form Description --}}

                {{-- Form Content --}}
                <form
                    action="{{ route(config('w-auth.routes.sign-up.name', 'auth.sign-up')) }}"
                    method="POST"
                    class="form">
                    @csrf

                    {{-- Form Input Email --}}
                    <div class="form-group">
                        <label
                            for="email"
                            class="form-label">
                            {{ __('sign-up.email') }}
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            placeholder="{{ __('sign-up.email.placeholder') }}"
                            required="on"
                            autocomplete="off"
                            class="form-input" />
                    </div>
                    {{-- Ends Form Input Email --}}

                    {{-- Form Input Password --}}
                    <div>
                        <label
                            for="password"
                            class="form-label">
                            {{ __('sign-up.password') }}
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

                    {{-- Form Input Confirm Password --}}
                    <div>
                        <label
                            for="confirm-password"
                            class="form-label">
                            {{ __('sign-up.confirm-password') }}
                        </label>
                        <input
                            type="confirm-password"
                            name="confirm-password"
                            id="confirm-password"
                            placeholder="••••••••••••"
                            required="on"
                            autocomplete="off"
                            class="form-input" />
                    </div>
                    {{-- Ends Form Input Confirm Password --}}

                    {{-- Form Input Terms And Conditions --}}
                    @if (config('w-auth.options.sign-up.terms-and-conditions'))
                    <div class="checkbox">
                        <div class="checkbox-wrapper">
                            <input
                                type="checkbox"
                                name="terms"
                                id="terms"
                                aria-describedby="terms"
                                required="on"
                                autocomplete="off"
                                class="checkbox-input" />
                        </div>
                        <div class="checkbox-text">
                            <label
                                for="terms"
                                class="checkbox-label">
                                {{ __('sign-up.terms.description') }} <a
                                    href="{{ url(config('w-auth.routes.terms-and-conditions.path', '/auth/terms-and-conditions')) }}"
                                    class="terms-link">
                                    {{ __('sign-up.terms') }}
                                </a>
                            </label>
                        </div>
                    </div>
                    @endif
                    {{-- Ends Form Input Terms And Conditions --}}

                    {{-- Form Input Privacy Policy --}}
                    @if (config('w-auth.options.sign-up.privacy-policy'))
                    <div class="checkbox">
                        <div class="checkbox-wrapper">
                            <input
                                type="checkbox"
                                name="policy"
                                id="policy"
                                aria-describedby="policy"
                                required="on"
                                class="checkbox-input" />
                        </div>
                        <div class="checkbox-text">
                            <label
                                for="policy"
                                class="checkbox-label">
                                {{ __('sign-up.policy.description') }} <a
                                    href="{{ url(config('w-auth.routes.privacy-policy.path','/auth/privacy-policy')) }}"
                                    class="policy-link">
                                    {{ __('sign-up.policy') }}
                                </a>
                            </label>
                        </div>
                    </div>
                    @endif
                    {{-- Ends Form Input Privacy Policy --}}

                    {{-- Form Button Submit --}}
                    <button
                        type="submit"
                        class="submit-button">
                        {{ __('sign-up.submit') }}
                    </button>
                    {{-- Ends Form Button Submit --}}

                    {{-- Form Footer --}}
                    <p
                        class="form-footer">
                        {{ __('sign-up.sign-in.description') }} <a
                            href="{{ url(config('w-auth.routes.sign-in.path', '/auth/sign-in')) }}"
                            class="form-footer-link">
                            {{ __('sign-up.sign-in') }}
                        </a>
                    </p>
                    {{-- Ends Form Footer --}}
                </form>
                {{-- Ends Form Content --}}
            </div>
        </div>
        {{-- Ends Form --}}
    </div>
</section>
@endsection