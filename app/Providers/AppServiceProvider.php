<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
        Route::pattern('tweetId', '[0-9]+');
        DB::listen(function ($query) {
            \Log::info("({$query->time}) $query->sql");
            \Log::info($query->bindings);
        });
    }
}
