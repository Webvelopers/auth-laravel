@if (isset($options['captcha']))
<div class="form-group">
    <div class="form-options">
        <span class="form-label">
            {{ __('sign-up.captcha') }}
        </span>
    </div>
    <input
        @if (config('app.env', 'production' )==='production' )
        type="hidden"
        @else
        type="text"
        @endif
        name="hashedcaptcha"
        value="{{ $options['captcha']['code'] }}"
        @if (config('app.env', 'production' ) !=='production' )
        class="form-input"
        @endif />
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
        <input
            type="text"
            name="captcha_{{ $loop->index + 1 }}"
            id="captcha_{{ $loop->index + 1 }}"
            @if (config('app.env', 'production' )==='production' )
            required="on"
            autocomplete="off"
            @endif
            class="form-captcha-input" />
        @if ($loop->last)
    </div>
    @endif
    @endforeach
</div>
@endif