<?php

namespace App\Filament\Resources\UserRequestResource\Pages;

use App\Filament\Resources\UserRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserRequests extends ListRecords
{
    protected static string $resource = UserRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
