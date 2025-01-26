<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/auth/sign-in')
                    ->assertSee('Webvelopers Auth')
                    ->assertPresent('input[type="email"]')
                    ->assertPresent('input[type="password"]')
                    ->assertPresent('button[type="submit"]');
        });
    }
}
