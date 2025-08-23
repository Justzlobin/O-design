<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Головний банер';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()->schema([
                    Forms\Components\Section::make()->schema([

                            Forms\Components\Toggle::make('is_active')
                                ->label('Активний')
                                ->default(true),

                            Forms\Components\TextInput::make('title')
                                ->label('Назва')
                                ->required(),

                            Forms\Components\RichEditor::make('description')
                                ->label('Опис')
                                ->required(),

                            Forms\Components\Fieldset::make()->schema([
                                Forms\Components\TextInput::make('location')
                                    ->label('Місто'),
                                Forms\Components\DatePicker::make('date')
                                    ->label('Дата'),
                                Forms\Components\TextInput::make('area')
                                    ->label('Площа')
                                    ->numeric()
                            ])->columns(3)

                    ])
                        ->columns(1)
                        ->columnSpan(1),

                    Forms\Components\Section::make()->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                            ->label('Зображення')
                            ->hint('(тільки одне)')
                            ->preserveFilenames()
                            ->required()
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
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активний')
                    ->boolean()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                //
            ])
            ->reorderable('sort')
            ->defaultSort('sort');
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
            'index' => Pages\ListBanners::route('/'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
            'create' => Pages\CreateBanner::route('/create'),
        ];
    }
}
