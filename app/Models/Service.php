<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'is_active'
    ];

    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class);
    }
}
