<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plan extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'is_active',
        'price'
    ];

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }
}
