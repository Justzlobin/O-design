<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlanResource\Pages;
use App\Models\Plan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PlanResource extends Resource
{
    protected static ?string $model = Plan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Тарифи';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->schema([

                        Forms\Components\Section::make()
                            ->schema([

                                Forms\Components\TextInput::make('title')
                                    ->hint(fn ($state) => mb_strlen($state) . '/60')
                                    ->reactive()
                                    ->label('Назва')
                                    ->required()
                                    ->maxLength(60),
                                Forms\Components\Textarea::make('desc')
                                    ->reactive()
                                    ->hint(fn ($state) => mb_strlen($state) . '/255')
                                    ->label('Опис')
                                    ->maxLength(255)
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('price')
                                    ->hint('$/h')
                                    ->label('Ціна')
                                    ->numeric()
                                    ->inputMode('decimal'),
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Активний')
                                    ->required(),

                            ])
                            ->columns(1)
                            ->columnSpan(1),

                        Forms\Components\Section::make()
                            ->schema([

                                Forms\Components\CheckboxList::make('service_id')
                                    ->relationship('services', 'title')
                                    ->label('Services')
                            ])
                            ->columns(1)
                            ->columnSpan(1)

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Назва')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Ціна')
                    ->label('Price'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активний')
                    ->boolean(),
                Tables\Columns\TextColumn::make('services.title')
                    ->label('Послуги')
                    ->label('Services')
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
            'index' => Pages\ListPlans::route('/'),
            'create' => Pages\CreatePlan::route('/create'),
            'edit' => Pages\EditPlan::route('/{record}/edit'),
        ];
    }
}
