<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SettingServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['pages.home', 'pages.news', 'pages.forum', 'pages.vacancy', 'components.footer', 'components.navbar', 'layouts.app'], function ($view) {
            $setting = Setting::first();
            $view->with('setting', $setting);
        });
    }
}
