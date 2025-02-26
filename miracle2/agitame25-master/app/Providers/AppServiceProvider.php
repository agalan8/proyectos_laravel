<?php

namespace App\Providers;

use App\Models\Noticia;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate::define('update-noticia', function (User $user, Noticia $noticia) {
        //     return $user->id === $noticia->user_id;
        // });
    }
}
