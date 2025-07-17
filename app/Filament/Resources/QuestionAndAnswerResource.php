<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionAndAnswerResource\Pages;
use App\Filament\Resources\QuestionAndAnswerResource\RelationManagers;
use App\Models\QuestionAndAnswer;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
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
                Grid::make()
                    ->schema([
                        Section::make()
                            ->schema([
                                TextInput::make('question')
                                    ->label('Питання')
                                    ->hint(fn($state) => mb_strlen($state) . '/255')
                                    ->maxLength(255)
                                    ->reactive()
                                    ->required(),
                            ]),
                        Section::make()
                            ->schema([
                                TextInput::make('answer')
                                    ->label('Відповідь')
                                    ->hint(fn($state) => mb_strlen($state) . '/1000')
                                    ->maxLength(1000)
                                    ->reactive()
                                    ->required(),
                            ]),

                    ]),
                Toggle::make('is_active')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Номер'),
                Tables\Columns\TextColumn::make('question')
                    ->label('Питання'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активний')
                    ->boolean()
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
            ])
            ->reorderable('sort');
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
