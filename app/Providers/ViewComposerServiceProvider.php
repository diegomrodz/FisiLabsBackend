<?php

namespace FisiLabs\Providers;

use Auth;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            ['admin.*', 'instructor.*'],
            function ($view) {
                $user = Auth::user();

                $view->with('user', $user);
                $view->with('access_token', $user->createToken($user->email . ' personal token.')->accessToken);
            }
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
