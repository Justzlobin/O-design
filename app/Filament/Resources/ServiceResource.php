<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Послуги';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Grid::make()
                    ->schema([

                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Назва')
                                    ->hint(fn($state) => mb_strlen($state) . '/60')
                                    ->required()
                                    ->maxLength(60),
                                Forms\Components\Textarea::make('desc')
                                    ->label('Опис')
                                    ->hint(fn($state) => mb_strlen($state) . '/255')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Активний')
                                    ->required(),
                            ])
                            ->columns(1)
                            ->columnSpan(1),

                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\CheckboxList::make('plan_id')
                                    ->label('Тарифи')
                                    ->relationship('plans', 'title')
                                    ->label('Plans'),
                            ])
                            ->columns(1)
                            ->columnSpan(1)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Назва')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активний')
                    ->boolean(),
                Tables\Columns\TextColumn::make('plans.title')
                    ->label('Тарифи')
            ])
            ->filters([
                //
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
