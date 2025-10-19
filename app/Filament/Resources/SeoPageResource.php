<?php

namespace App\Filament\Resources;

use App\Enums\Page;
use App\Filament\Resources\SeoPageResource\Pages;
use App\Filament\Resources\SeoPageResource\RelationManagers;
use App\Models\SeoPage;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class SeoPageResource extends Resource
{
    protected static ?string $model = SeoPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'SEO сторінок';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Grid::make()
                    ->schema([

                        Section::make()->schema([
                            TextInput::make('page_slug')
                                ->label('URL назва')
                                ->readOnly()
                                ->disabled()
                                ->rules(fn($record) => [
                                    $record
                                        ? Rule::unique('seo_pages', 'page_slug')->ignore($record->id)
                                        : 'unique:seo_pages,page_slug'
                                ])
                                ->hint('Ідентифікатор сторінки (не редагується)')
                                ->required(),

                            TextInput::make('meta_title')
                                ->label('Назва')
                                ->reactive()
                                ->hint(fn($state) => mb_strlen($state) . '/60')
                                ->maxLength(60),

                            TextInput::make('heading')
                                ->label('H1')
                                ->reactive()
                                ->hint(fn($state) => mb_strlen($state) . '/255')
                                ->maxLength(255),

                            TextInput::make('meta_description')
                                ->label('Опис')
                                ->reactive()
                                ->hint(fn($state) => mb_strlen($state) . '/255')
                                ->maxLength(255),

                            TextInput::make('meta_keywords')
                                ->label('Ключові слова')
                                ->reactive()
                                ->hint(fn($state) => mb_strlen($state) . '/255')
                                ->maxLength(255),
                        ])
                            ->columns(1)
                            ->columnSpan(1),

                        Section::make()->schema([
                            SpatieMediaLibraryFileUpload::make('image')
                                ->label('Зображення в посиланнях')
                        ])
                            ->columns(1)
                            ->columnSpan(1),
                    ]),


            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_slug')->label('URL назва'),
                Tables\Columns\TextColumn::make('meta_title')->label('Назва сторінки'),
                Tables\Columns\TextColumn::make('meta_description')->label('Опис сторінки'),
                Tables\Columns\TextColumn::make('meta_keywords')->label('Ключові слова'),
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
            'index' => Pages\ListSeoPages::route('/'),
            'create' => Pages\CreateSeoPage::route('/create'),
            'edit' => Pages\EditSeoPage::route('/{record}/edit'),
        ];
    }
}
