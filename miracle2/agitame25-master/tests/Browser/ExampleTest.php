<?php

use App\Models\User;
use Laravel\Dusk\Browser;

test('basic example', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
                ->assertSee('Inicio');
    });
});

test('login con usuario que no existe', function (){
    $this->browse(function (Browser $browser) {
        $browser->visit('/login')
            ->type('email', 'admin@admin.com')
            ->type('password', 'password')
            ->click('button')
            ->assertSee('Inicio')
            ->assertSee('admin')
            ->assertPathIs('/');
    });
});
