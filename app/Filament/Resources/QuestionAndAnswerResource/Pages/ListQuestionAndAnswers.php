<?php

namespace App\Filament\Resources\QuestionAndAnswerResource\Pages;

use App\Filament\Resources\QuestionAndAnswerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuestionAndAnswers extends ListRecords
{
    protected static string $resource = QuestionAndAnswerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
