<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\URL;
use App\Models\User;

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
	if ($this->app->environment('production')) {
            //parent::boot();
            // Add following lines to force laravel to use APP_URL as root url for the app.
            $strBaseURL = $this->app['url'];
            $strBaseURL->forceRootUrl(config('app.url'));
        }
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        ResetPassword::createUrlUsing(function (User $user, string $token) {
            return url('password/reset/'.$token.'?email='.$user->email);
        });
    }
}
