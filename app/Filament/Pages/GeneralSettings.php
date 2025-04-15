<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings as GeneralSettingsModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class GeneralSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static string $settings = GeneralSettingsModel::class;
    protected static ?string $navigationLabel = 'Загальні налаштування';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('site_name')
                        ->label('Імя Сайту')
                        ->required(),
                    Forms\Components\TextInput::make('tel')
                        ->label('Телефон')
                        ->tel()
                        ->required(),
                    Forms\Components\TextInput::make('slogan')
                        ->label('Девіз')
                        ->maxLength(55)
                        ->required(),
                    Forms\Components\TextInput::make('email')
                        ->label('Пошта')
                        ->dehydrateStateUsing(fn($state) => str_replace('@', '<wbr>@', $state))
                        ->formatStateUsing(fn($state) => str_replace('<wbr>@', '@', $state))
                        ->email()
                        ->required(),

                    Forms\Components\Grid::make()->schema([
                        Forms\Components\Section::make()->schema([
                            Forms\Components\ColorPicker::make('color_1')
                                ->label('Основний колір 1')
                                ->hint('Білий')
                                ->required(),
                            Forms\Components\ColorPicker::make('color_2')
                                ->label('Основний колір 2')
                                ->hint('Сірий')
                                ->required(),
                            Forms\Components\ColorPicker::make('color_3')
                                ->label('Основний колір 3')
                                ->hint('Чорний')
                                ->required(),
                            Forms\Components\ColorPicker::make('color_text_1')
                                ->label('Текст колір 1')
                                ->hint('Світлий')
                                ->required(),
                            Forms\Components\ColorPicker::make('color_text_2')
                                ->label('Текст колір 2')
                                ->hint('Темний')
                                ->required(),
                            Forms\Components\ColorPicker::make('color_transparent_1')
                                ->label('Колір 1 - прозорий')
                                ->default('0, 0, 0, .5')
                                ->rgba()
                                ->required(),
                            Forms\Components\ColorPicker::make('color_transparent_2')
                                ->label('Колір 2 - прозорий')
                                ->rgba()
                                ->required(),
                        ])
                            ->columns(1)
                            ->columnSpan(1)
                            ->description('Світла сторона')
                        ,
                        Forms\Components\Section::make()->schema([
                            Forms\Components\ColorPicker::make('dark_color_1')
                                ->label('Колір 1')
                                ->hint('Початково - білий')
                                ->required(),
                            Forms\Components\ColorPicker::make('dark_color_2')
                                ->label('Колір 2')
                                ->hint('Початково - Чорний')
                                ->required(),
                            Forms\Components\ColorPicker::make('dark_color_3')
                                ->label('Колір 2')
                                ->hint('Початково - Чорний')
                                ->required(),
                            Forms\Components\ColorPicker::make('dark_color_text_1')
                                ->label('Колір 2')
                                ->hint('Початково - Чорний')
                                ->required(),
                            Forms\Components\ColorPicker::make('dark_color_text_2')
                                ->label('Колір 2')
                                ->hint('Початково - Чорний')
                                ->required(),
                            Forms\Components\ColorPicker::make('dark_color_transparent_1')
                                ->label('Колір 2 - прозорий')
                                ->rgba()
                                ->required(),
                            Forms\Components\ColorPicker::make('dark_color_transparent_2')
                                ->label('Колір 2 - прозорий')
                                ->rgba()
                                ->required(),
                        ])
                            ->columns(1)
                            ->columnSpan(1)
                            ->description('Темна сторона')

                    ])
                ])
            ]);
    }
}
