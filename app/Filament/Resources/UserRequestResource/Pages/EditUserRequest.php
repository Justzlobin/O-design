<?php

namespace App\Filament\Resources\UserRequestResource\Pages;

use App\Filament\Resources\UserRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserRequest extends EditRecord
{
    protected static string $resource = UserRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
