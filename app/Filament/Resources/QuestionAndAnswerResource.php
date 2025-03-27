<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionAndAnswerResource\Pages;
use App\Filament\Resources\QuestionAndAnswerResource\RelationManagers;
use App\Models\QuestionAndAnswer;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class QuestionAndAnswerResource extends Resource
{
    protected static ?string $model = QuestionAndAnswer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Питання/Відповідді';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('question')
                    ->required(),
                TextInput::make('answer')
                    ->required(),
                Toggle::make('is_active')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('question'),
                Tables\Columns\TextColumn::make('answer'),
            ])
            ->filters([
                Tables\Filters\BaseFilter::make('id')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuestionAndAnswers::route('/'),
            'create' => Pages\CreateQuestionAndAnswer::route('/create'),
            'edit' => Pages\EditQuestionAndAnswer::route('/{record}/edit'),
        ];
    }
}
