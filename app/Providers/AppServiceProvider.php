<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \URL::forceScheme('https');
       \Blade::directive('User', function() {
        if (\Auth::check()) {
            $user = Auth::user();
            if ($user->id == 2)
            {
                $user = \Auth::user();
        return "Remeber {$user->name} Your An Admin;)";
            }
    }
});
\Blade::directive('Secret', function() {
        if (\Auth::check()) {
            $user = Auth::user();
            if ($user->plan == "yearly")
            {
                $user = \Auth::user();
        return "Remeber {$user->name} theres the secret page Sub;)";
            }
    }
});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
