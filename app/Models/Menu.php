<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Menu extends Model implements HasMedia, Sortable
{
    use InteractsWithMedia;
    use SortableTrait;

    protected $fillable = [
        'title',
        'link',
        'background_type',
        'is_active',
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('menu_jpg')
            ->format('jpg')
            ->width(720)
            ->height(410)
            ->quality(90)
            ->nonQueued();

        $this
            ->addMediaConversion('menu_webp')
            ->format('webp')
            ->width(720)
            ->height(410)
            ->quality(90)
            ->nonQueued();
    }
}
