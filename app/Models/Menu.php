<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Menu extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'link',
        'background_type',
        'is_active',
        'position'
    ];
}
