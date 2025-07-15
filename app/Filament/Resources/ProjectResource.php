<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use RalphJSmit\Filament\SEO\SEO;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Проєкти';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(components: [
                Forms\Components\Grid::make()->schema([

                    Section::make()
                        ->schema(components: [

                            TextInput::make('title')
                                ->label('Назва')
                                ->required()
                                ->maxLength(60)
                                ->reactive()
                                ->debounce(700)
                                ->afterStateUpdated(function ($state, callable $set) {
                                    $set('slug', Str::slug($state));
                                }),
                            Forms\Components\TextInput::make('slug')
                                ->readOnly()
                                ->disabled(fn ($record) => $record !== null)
                                ->required()
                                ->maxLength(255)
                                ->hint('Slug генерується автоматично')
                                ->rules(fn ($record) => [
                                    $record
                                        ? Rule::unique('projects', 'slug')->ignore($record->id)
                                        : 'unique:projects,slug'
                                ]),
                            Forms\Components\RichEditor::make('description')
                                ->label('Опис')
                                ->required(),
                            Forms\Components\Select::make('type')
                                ->label('Тип')
                                ->options([
                                    'privat' => 'Приватний',
                                    'commercial' => 'Комерційний'
                                ])
                                ->native(false)
                                ->required()
                        ])
                        ->columns(1)
                        ->columnSpan(1),
                    Section::make()
                        ->schema([
                            SpatieMediaLibraryFileUpload::make('image')
                                ->collection('project-images')
                                ->preserveFilenames()
                                ->reorderable()
                                ->multiple()
                                ->required()
                        ])
                        ->columns(1)
                        ->columnSpan(1),
                    Section::make()
                        ->schema([
                            SEO::make()
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
                    ->searchable(),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('images_count')
                    ->getStateUsing(function ($record) {
                        return $record->getMedia('project-images')->count();
                    }),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
