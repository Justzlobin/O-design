<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name = '';
    public bool $site_active = false;
    public string $menu_gradient = '';
    public string $tel = '';
    public string $slogan = '';
    public string $email = '';

    public static function group(): string
    {
        return 'general';
    }
}
