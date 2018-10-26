<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// MySQL5.7.7、またはMariaDB10.2.2より古い場合に必要です。
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // 本番環境(Heroku)でhttpsを強制する
        if (\App::environment('production')) {
            \URL::forceScheme('https');
        }
        // MySQL5.7.7、またはMariaDB10.2.2より古い場合に必要です。
        Schema::defaultStringLength(191);
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
