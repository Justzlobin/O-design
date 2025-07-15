<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
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

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            image: $this->getFirstMediaUrl('project-images'),
        );
    }

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
            ->addMediaConversion('thumb_jpg')
            ->width(225)
            ->height(150)
            ->sharpen(10)
            ->fit(Fit::Contain)
            ->nonQueued();

        $this
            ->addMediaConversion('thumb_webp')
            ->format('webp')
            ->width(225)
            ->height(150)
            ->sharpen(10)
            ->fit(Fit::Contain)
            ->nonQueued();

        $this
            ->addMediaConversion('original_jpg')
            ->format('jpg')
            ->nonQueued();

        $this
            ->addMediaConversion('original_webp')
            ->format('webp')
            ->nonQueued();

        $this
            ->addMediaConversion('thumb_big_jpg')
            ->height(200)
            ->fit(Fit::Contain)
            ->nonQueued();

        $this
            ->addMediaConversion('thumb_big_webp')
            ->format('webp')
            ->height(200)
            ->fit(Fit::Contain)
            ->nonQueued();

        $this
            ->addMediaConversion('list_jpg')
            ->format('jpg')
            ->width(720)
            ->height(410)
            ->quality(90)
            ->nonQueued();

        $this
            ->addMediaConversion('list_webp')
            ->format('webp')
            ->width(720)
            ->height(410)
            ->quality(90)
            ->nonQueued();
    }
}
