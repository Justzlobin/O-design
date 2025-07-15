<?php

namespace App\Filament\Resources\UserRequestResource\Pages;

use App\Filament\Resources\UserRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserRequest extends CreateRecord
{
    protected static string $resource = UserRequestResource::class;
}
