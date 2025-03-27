<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class  Project extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    use HasSEO;

    protected $fillable = [
        'title',
        'description',
        'type',
        'slug'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('project-images');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->width(225)
            ->height(150)
            ->sharpen(10)
            ->fit(Fit::Contain)
            ->nonQueued();

        $this
            ->addMediaConversion('gallery_big')
            ->format('png')
            ->fit(Fit::Max, 9999, 800)
            ->keepOriginalImageFormat()
            ->nonOptimized()
            ->quality(100)
            ->nonQueued();

        $this
            ->addMediaConversion('gallery_small')
            ->height(200)
            ->fit(Fit::Contain)
            ->nonQueued();
        $this
            ->addMediaConversion('gallery_small_webp')
            ->format('webp')
            ->quality(90)
            ->fit(Fit::Crop, 390, 310)
            ->nonQueued();
    }
}
