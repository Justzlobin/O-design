<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Меню';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()->schema([

                    Forms\Components\Section::make()->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Назва')
                            ->required(),

                        Forms\Components\TextInput::make('link')
                            ->label('Посилання')
                            ->readOnly(),

                        Forms\Components\TextInput::make('position')
                            ->label('Позиція')
                            ->required()
                            ->default(1)
                            ->minValue(1)
                            ->maxValue(4)
                            ->integer(),

                        Select::make('background_type')
                            ->label('Тип фону')
                            ->options([
                                'image' => 'Image',
                                'gradient' => 'Gradient',])
                            ->default('gradient')
                            ->native(false)
                            ->reactive()
                            ->required(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Активний')
                            ->default(true),
                    ])
                        ->columns(1)
                        ->columnSpan(1),

                    Forms\Components\Section::make()->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                            ->label('Зображення на фоні')
                            ->hint('(лише одне)')
                            ->visible(fn($get) => $get('background_type') === 'image')
                            ->required(),
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
                    ->label('Назва меню'),
                Tables\Columns\TextColumn::make('background_type')
                    ->label('Тип фону'),
                Tables\Columns\TextColumn::make('position')
                    ->label('Позиція')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активний')
                    ->boolean()
            ])
            ->defaultSort('position')
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

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
//            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
