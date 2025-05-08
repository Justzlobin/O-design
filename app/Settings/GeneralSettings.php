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

    public string $color_1 = '#FBFBFB';
    public string $color_2 = '#D8DFE5';
    public string $color_3 = '#8FABB7';
    public string $color_5 = '#01070A';
    public string $color_text_1 = '#fff';

    public string $dark_color_1 = '#101116';
    public string $dark_color_2 = '#2F3148';
    public string $dark_color_3 = '#3F5576';
    public string $dark_color_5 = '#8689AC';
    public string $dark_color_text_1 = '#000';

    public static function group(): string
    {
        return 'general';
    }
}
