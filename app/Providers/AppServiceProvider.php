<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Plan;
use App\Models\Social;
use App\Models\User;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
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
        $generalSettings = app(GeneralSettings::class);

        Config::set('settings.site_name', $generalSettings->site_name);

        View::share('plans', Plan::where('is_active', 1)->get());
        View::share('socials', Social::where('is_active', 1)->get());
        View::share('menus', Menu::where('is_active', 1)->orderBy('position', 'ASC')->get());
        View::share('generalSettings', $generalSettings);
        Gate::define('use-translation-manager', static function (?User $user) {
            // Your authorization logic
            return $user !== null && $user->hasRole('super_admin');
//            return true;
        });
    }
}
