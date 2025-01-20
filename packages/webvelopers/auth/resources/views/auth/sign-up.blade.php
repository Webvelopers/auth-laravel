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
                    <div class="form-group">
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
                    @if (config('w-auth.options.sign-up.confirm-password'))
                    <div class="form-group">
                        <label
                            for="confirm-password"
                            class="form-label">
                            {{ __('sign-up.confirm-password') }}
                        </label>
                        <input
                            type="password"
                            name="confirm-password"
                            id="confirm-password"
                            placeholder="••••••••••••"
                            required="on"
                            autocomplete="off"
                            class="form-input" />
                    </div>
                    @endif
                    {{-- Ends Form Input Confirm Password --}}

                    {{-- Form Input Captcha --}}
                    @if (config('w-auth.options.sign-up.captcha'))
                    <div class="form-captcha">
                        <div class="form-options">
                            <span
                                class="form-label">
                                {{ __('sign-up.captcha') }}
                            </span>
                            <button
                                name="refresh"
                                id="refresh"
                                class="form-captcha-reset">
                                {{ __('sign-up.captcha.button') }}
                            </button>
                        </div>
                        <div
                            id="captcha"
                            class="form-captcha-images">
                            <img
                                src="https://placehold.co/48x48?text=0"
                                alt="captcha-1"
                                class="form-captcha-image" />
                            <img
                                src="https://placehold.co/48x48?text=0"
                                alt="captcha-2"
                                class="form-captcha-image" />
                            <img
                                src="https://placehold.co/48x48?text=0"
                                alt="captcha-3"
                                class="form-captcha-image" />
                            <img
                                src="https://placehold.co/48x48?text=0"
                                alt="captcha-4"
                                class="form-captcha-image" />
                            <img
                                src="https://placehold.co/48x48?text=0"
                                alt="captcha-5"
                                class="form-captcha-image" />
                            <img
                                src="https://placehold.co/48x48?text=0"
                                alt="captcha-6"
                                class="form-captcha-image" />
                        </div>
                        <div
                            class="form-captcha-inputs">
                            <input
                                type="text"
                                name="captcha-1"
                                id="captcha-1"
                                require="on"
                                class="form-captcha-input" />
                            <input
                                type="text"
                                name="captcha-2"
                                id="captcha-2"
                                require="on"
                                class="form-captcha-input" />
                            <input
                                type="text"
                                name="captcha-3"
                                id="captcha-3"
                                require="on"
                                class="form-captcha-input" />
                            <input
                                type="text"
                                name="captcha-4"
                                id="captcha-4"
                                require="on"
                                class="form-captcha-input" />
                            <input
                                type="text"
                                name="captcha-5"
                                id="captcha-5"
                                require="on"
                                class="form-captcha-input" />
                            <input
                                type="text"
                                name="captcha-6"
                                id="captcha-6"
                                require="on"
                                class="form-captcha-input" />
                        </div>
                    </div>
                    @endif
                    {{-- Ends Form Input Captcha --}}

                    {{-- Form Input Terms And Conditions --}}
                    @if (config('w-auth.options.sign-up.terms-and-conditions'))
                    <div class="form-group">
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
                    </div>
                    @endif
                    {{-- Ends Form Input Terms And Conditions --}}

                    {{-- Form Input Privacy Policy --}}
                    @if (config('w-auth.options.sign-up.privacy-policy'))
                    <div class="form-group">
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

@section('script')
<script>
    const imageUrls = [
        "{{ url('vendor/webvelopers/auth/images/captcha/0.webp') }}",
        "{{ url('vendor/webvelopers/auth/images/captcha/1.webp') }}",
        "{{ url('vendor/webvelopers/auth/images/captcha/2.webp') }}",
        "{{ url('vendor/webvelopers/auth/images/captcha/3.webp') }}",
        "{{ url('vendor/webvelopers/auth/images/captcha/4.webp') }}",
        "{{ url('vendor/webvelopers/auth/images/captcha/5.webp') }}",
        "{{ url('vendor/webvelopers/auth/images/captcha/6.webp') }}",
        "{{ url('vendor/webvelopers/auth/images/captcha/7.webp') }}",
        "{{ url('vendor/webvelopers/auth/images/captcha/8.webp') }}",
        "{{ url('vendor/webvelopers/auth/images/captcha/9.webp') }}",
    ];

    const imageSource = "{{ url('vendor/webvelopers/auth/images/captcha') }}";
    const refreshButton = document.getElementById("refresh");
    const inputs = document.querySelectorAll('input[name^="captcha-"]');

    function loadImage(url) {
        return new Promise((resolve, reject) => {
            const img = new Image();
            img.onload = () => resolve(img);
            img.onerror = reject;
            img.src = url;
        });
    }

    async function loadAllImages() {
        const promises = imageUrls.map(loadImage);
        return Promise.all(promises);
    }

    function randomImages(imageSource) {
        const divImages = document.getElementById("captcha");
        divImages.innerHTML = "";
        divImages.classList.add("form-captcha-images");

        for (let i = 1; i < 7; i++) {
            const imageElement = document.createElement("img");
            const randomNumber = Math.floor(Math.random() * 10);
            imageElement.src = imageSource + "/" + randomNumber + ".webp";
            imageElement.alt = `captcha-${i}`;
            imageElement.classList.add("form-captcha-image");
            divImages.appendChild(imageElement);
        }
    }

    inputs.forEach((input, i) => {
        input.addEventListener("input", (event) => {
            const value = event.target.value;
            event.target.value = value.replace(/[^0-9]/g, "").slice(0, 1);

            if (value) {
                if (i < inputs.length - 1) {
                    inputs[i + 1].focus();
                }
            }
        });

        input.addEventListener("keypress", (event) => {
            if (isNaN(event.key)) {
                event.preventDefault();
            } else {
                event.target.value = event.key.slice(0, 1);
            }
        });

        input.addEventListener("keydown", (event) => {
            if (event.key === "Backspace" && event.target.value === "") {
                if (i > 0) {
                    inputs[i - 1].focus();
                }
            }
        });
    });

    refreshButton.addEventListener("click", (event) => {
        event.preventDefault();
        randomImages(imageSource);
        inputs.forEach((input) => {
            input.value = "";
        });
        inputs[0].focus();
    });

    loadAllImages()
        .then(() => {
            randomImages(imageSource);
        })
        .catch((error) => {
            console.error("{{ __('sign-up.captcha.error.images') }}", error);
        });
</script>
<script src="{{ url('vendor/webvelopers/auth/js/sign-up.js') }}"></script>
@endsection