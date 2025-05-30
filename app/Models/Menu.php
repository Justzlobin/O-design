<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('menu_jpg')
            ->format('jpg')
            ->fit(Fit::Crop, 720, 410)
            ->quality(90)
            ->nonQueued();

        $this
            ->addMediaConversion('menu_webp')
            ->format('webp')
            ->fit(Fit::Crop, 720, 410)
            ->quality(90)
            ->nonQueued();
    }
}
