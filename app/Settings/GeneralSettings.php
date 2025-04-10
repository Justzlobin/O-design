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
    public string $color_1 = '#fff';
    public string $color_2 = '#000';
    public string $color_2_transparent = '#000';

    public static function group(): string
    {
        return 'general';
    }
}
