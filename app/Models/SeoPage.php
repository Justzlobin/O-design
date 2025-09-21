<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SeoPage extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'heading',
        'page_slug',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];
}
