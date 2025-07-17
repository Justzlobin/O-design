<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class QuestionAndAnswer extends Model implements Sortable
{
    use SortableTrait;

    protected $fillable = [
        'question',
        'answer',
        'is_active'
    ];
}
