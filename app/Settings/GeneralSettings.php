<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public bool $site_active;
    public string $menu_gradient;
    public string $tel;
    public string $slogan = '';

    public static function group(): string
    {
        return 'general';
    }
}
