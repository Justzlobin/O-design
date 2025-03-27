<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'title',
        'url',
        'is_active',
        'position',
        'icon'
    ];
}
