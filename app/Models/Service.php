<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Service extends Model implements Sortable
{
    use SortableTrait;

    protected $fillable = [
        'title',
        'desc',
        'is_active'
    ];

    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class);
    }

    public function scopeIsActive(Builder $query, bool $isActive = true): Builder
    {
        return $query->where('is_active', $isActive);
    }
}
