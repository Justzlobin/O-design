<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Banner extends Model implements HasMedia, Sortable
{
    use InteractsWithMedia;
    use SortableTrait;

    protected $fillable = [
        'title',
        'is_active',
        'description',
        'location',
        'date',
        'area'
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('main_jpg')
            ->format('jpg')
            ->fit(Fit::Fill)
            ->height(1245)
            ->nonQueued();

        $this
            ->addMediaConversion('main_webp')
            ->format('webp')
            ->fit(Fit::Fill)
            ->height(1245)
            ->nonQueued();

        $this
            ->addMediaConversion('original_jpg')
            ->format('jpg')
            ->quality(90)
            ->nonQueued();

        $this
            ->addMediaConversion('original_webp')
            ->format('webp')
            ->quality(90)
            ->nonQueued();
    }
}
