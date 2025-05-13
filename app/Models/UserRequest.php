<?php

namespace App\Models;

use App\Enums\UserRequestStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserRequest extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'comment',
        'plan_id',
        'status'
    ];

    protected $casts = [
        'status' => UserRequestStatus::class
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }
}
