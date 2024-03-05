<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;

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
        App::setLocale('ru');

        Validator::extend('full_name', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[А-Яа-яЁё]+\s[А-Яа-яЁё]+\s[А-Яа-яЁё]+$/u', $value);
        }, 'full_name');

        Validator::extend('license_plate', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[АВЕКМНОРСТУХABEKMHOPCTYXавекмнорстух\d]{1}\d{3}[АВЕКМНОРСТУХABEKMHOPCTYXавекмнорстух\d]{2}\d{2,3}$/u', $value);
        }, 'license_plate');

        Vite::macro('image', fn (string $asset) => $this->asset("resources/images/{$asset}"));
    }
}
