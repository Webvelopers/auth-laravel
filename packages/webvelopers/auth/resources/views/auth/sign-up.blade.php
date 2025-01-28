@extends('w-auth::layouts.guess')

@section('title', __('Sign Up'))

@section('content')
@php

//if(session()->all()) dd(session()->all());

@endphp
<section class="section-container">
    <div class="section-wrapper">

        {{-- Logo --}}
        <a href="{{ url(config('w-auth.routes.home.path', '/')) }}" class="logo-link">
            <img src="{{ config('w-auth.assets.img.logo', 'https://placehold.co/32x32/2563eb/fff/svg') }}" alt="logo" class="logo-image">
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
                <form action="{{ route(config('w-auth.routes.sign-up.store', 'auth.sign-up.store')) }}" method="POST" class="form">

                    {{-- Form CSRF Protection --}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    {{-- Ends Form CSRF Protection --}}

                    {{-- Form Input Name --}}
                    <div class="form-group">
                        <label for="name" @if (session('name')) class="form-label-error" @else class="form-label" @endif>
                            {{ __('sign-up.name') }}
                        </label>
                        <input type="text" name="name" id="name" @if(old('name')) value="{{ old('name') }}" @else @if(config('app.env', 'production' ) !=='production' ) value="{{ config('w-auth.test.sign-up.name', 'John Doe') }}" @endif @endif placeholder="{{ __('sign-up.name.placeholder') }}" @if(config('app.env', 'production' )==='production' ) required="on" @endif @if(config('app.env', 'production' )==='production' ) autocomplete="off" @endif @if (session('name')) class="form-input-error" @else class="form-input" @endif />
                        @if (session('name'))
                        @foreach (session('name') as $message)
                        <p class="form-input-message">
                            {{ $message }}
                        </p>
                        @endforeach
                        @endif
                    </div>
                    {{-- Ends Form Input Name --}}

                    {{-- Form Input Email --}}
                    <div class="form-group">
                        <label for="email" @if (session('email')) class="form-label-error" @else class="form-label" @endif>
                            {{ __('sign-up.email') }}
                        </label>
                        <input type=@if(config('app.env', 'production' )==='production' ) "email" @else "text" @endif name="email" id="email" @if(old('email')) value="{{ old('email') }}" @else @if(config('app.env', 'production' ) !=='production' ) value="{{ config('w-auth.test.sign-up.email', 'john.doe@email.com') }}" @endif @endif placeholder="{{ __('sign-up.email.placeholder') }}" @if(config('app.env', 'production' )==='production' ) required="on" @endif @if(config('app.env', 'production' )==='production' ) autocomplete="off" @endif @if (session('email')) class="form-input-error" @else class="form-input" @endif />
                        @if (session('email'))
                        @foreach (session('email') as $message)
                        <p class="form-input-message">
                            {{ $message }}
                        </p>
                        @endforeach
                        @endif
                    </div>
                    {{-- Ends Form Input Email --}}

                    {{-- Form Input Password --}}
                    <div class="form-group">
                        <label for="password" @if (session('password')) class="form-label-error" @else class="form-label" @endif>
                            {{ __('sign-up.password') }}
                        </label>
                        <input type=@if(config('app.env', 'production' )==='production' ) "password" @else "text" @endif name="password" id="password" @if(old('password')) value="{{ old('password') }}" @else @if(config('app.env', 'production' ) !=='production' ) value="{{ config('w-auth.test.sign-up.password', 'Password1234.') }}" @endif @endif placeholder="••••••••••••" @if(config('app.env', 'production' )==='production' ) required="on" @endif @if(config('app.env', 'production' )==='production' ) autocomplete="off" @endif @if (session('password')) class="form-input-error" @else class="form-input" @endif />
                        @if (session('password'))
                        @foreach (session('password') as $message)
                        <p class="form-input-message">
                            {{ $message }}
                        </p>
                        @endforeach
                        @endif
                    </div>
                    {{-- Ends Form Input Password --}}

                    {{-- Form Input Confirm Password --}}
                    @if (config('w-auth.options.sign-up.password-confirmation', true))
                    <div class="form-group">
                        <label for="password_confirmation" @if (session('password')) class="form-label-error" @else class="form-label" @endif>
                            {{ __('sign-up.password-confirmation') }}
                        </label>
                        <input type=@if(config('app.env', 'production' )==='production' ) "password" @else "text" @endif name="password_confirmation" id="password_confirmation" @if(old('password_confirmation')) value="{{ old('password_confirmation') }}" @else @if(config('app.env', 'production' ) !=='production' ) value="{{ config('w-auth.test.sign-up.password', 'Password1234.') }}" @endif @endif placeholder="••••••••••••" @if (config('app.env', 'production' )==='production' ) required="on" @endif @if (config('app.env', 'production' )==='production' ) autocomplete="off" @endif @if (session('password')) class="form-input-error" @else class="form-input" @endif />
                        @if (session('password_confirmation'))
                        @foreach (session('password_confirmation') as $message)
                        <p class="form-input-message">
                            {{ $message }}
                        </p>
                        @endforeach
                        @endif
                    </div>
                    @endif
                    {{-- Ends Form Input Confirm Password --}}

                    {{-- Form Input Captcha --}}
                    @if (config('w-auth.options.sign-up.captcha'))
                    @if (isset($options['captcha']))
                    <div class="form-group">
                        <div class="form-options">
                            <span class="form-label">
                                {{ __('sign-up.captcha') }}
                            </span>
                        </div>
                        <input type=@if(config('app.env', 'production' )==='production' ) "hidden" @else "text" @endif name="hashedcaptcha" value="{{ $options['captcha']['code'] }}" @if(config('app.env', 'production' ) !=='production' ) class="form-input" @endif />
                        @foreach ($options['captcha']['images'] as $image)
                        @if ($loop->first)
                        <div class="form-captcha-images">
                            @endif
                            <div class="form-captcha-image">
                                {!! $image !!}
                            </div>
                            @if ($loop->last)
                        </div>
                        @endif
                        @endforeach
                        @foreach ($options['captcha']['images'] as $image)
                        @if ($loop->first)
                        <div class="form-captcha-inputs">
                            @endif
                            <input type="text" name="captcha-{{ $loop->index + 1 }}" id="captcha-{{ $loop->index + 1 }}" @if(config('app.env', 'production' ) !=='production' ) value="{{ config('w-auth.test.sign-up.captcha', '0') }}" @endif @if(config('app.env', 'production' )==='production' ) required="on" @endif @if(config('app.env', 'production' )==='production' ) autocomplete="off" @endif class="form-captcha-input" />
                            @if ($loop->last)
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endif
                    @endif
                    {{-- Ends Form Input Captcha --}}

                    {{-- Form Input Terms And Conditions --}}
                    @if (config('w-auth.options.sign-up.terms-and-conditions'))
                    <div class="form-group">
                        <div class="checkbox">
                            <div class="checkbox-wrapper">
                                <input type="checkbox" name="terms" id="terms" @if(old('terms')) value="{{ old('terms') }}" @else @if(config('app.env', 'production' ) !=='production' ) value="{{ config('w-auth.test.sign-up.terms', true) }}" @endif @endif aria-describedby="terms" @if(config('app.env', 'production' )==='production' ) required="on" @endif @if(config('app.env', 'production' )==='production' ) autocomplete="off" @endif class="checkbox-input" />
                            </div>
                            <div class="checkbox-text">
                                <label for="terms" class="checkbox-label">
                                    {{ __('sign-up.terms.description') }} <a href="{{ url(config('w-auth.routes.terms-and-conditions.path', '/auth/terms-and-conditions')) }}" target="_blank" class="terms-link">
                                        {{ __('sign-up.terms') }}
                                    </a>
                                </label>
                                @if (session('terms'))
                                @foreach (session('terms') as $message)
                                <p class="checkbox-message">
                                    {{ $message }}
                                </p>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    {{-- Ends Form Input Terms And Conditions --}}

                    {{-- Form Input Privacy Policy --}}
                    @if (config('w-auth.options.sign-up.privacy-policy'))
                    <div class="form-group">
                        <div class="checkbox">
                            <div class="checkbox-wrapper">
                                <input type="checkbox" name="policy" id="policy" @if(old('policy')) value="{{ old('policy') }}" @else @if(config('app.env', 'production' ) !=='production' ) value="{{ config('w-auth.test.sign-up.policy', true) }}" @endif @endif aria-describedby="policy" @if(config('app.env', 'production' )==='production' ) required="on" @endif @if(config('app.env', 'production' )==='production' ) autocomplete="off" @endif class="checkbox-input" />
                            </div>
                            <div class="checkbox-text">
                                <label for="policy" class="checkbox-label">
                                    {{ __('sign-up.policy.description') }} <a href="{{ url(config('w-auth.routes.privacy-policy.path', '/auth/privacy-policy')) }}" target="_blank" class="policy-link">
                                        {{ __('sign-up.policy') }}
                                    </a>
                                </label>
                                @if (session('policy'))
                                @foreach (session('policy') as $message)
                                <p class="checkbox-message">
                                    {{ $message }}
                                </p>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    {{-- Ends Form Input Privacy Policy --}}

                    {{-- Form Button Submit --}}
                    <button type="submit" class="submit-button">
                        {{ __('sign-up.submit') }}
                    </button>
                    {{-- Ends Form Button Submit --}}

                    {{-- Form Footer --}}
                    <p class="form-footer">
                        {{ __('sign-up.sign-in.description') }} <a href="{{ url(config('w-auth.routes.sign-in.path', '/auth/sign-in')) }}" class="form-footer-link">
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

@section('script')
@if (config('w-auth.options.sign-up.captcha'))
<script src="{{ url('vendor/webvelopers/auth/js/sign-up.js') }}"></script>
@endif
@endsection

@php

session()->flush();

@endphp