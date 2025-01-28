<?php

namespace Webvelopers\Auth\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\Component;
use Webvelopers\Auth\Services\CaptchaService;

class CaptchaComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(private bool $showError = false) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $options['captcha'] = CaptchaService::generateCaptcha(
            config('w-auth.show.dark-mode', true),
            $this->showError
        );
        $options['captcha']['code'] = Hash::make($options['captcha']['code']);

        return view('w-auth::components.captcha', ['options' => $options]);
    }
}
