<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings as GeneralSettingsModel;
use Filament\Forms;
use Filament\Forms\Components\Section;
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
                Section::make()->schema([

                    Forms\Components\Grid::make()->schema([
                        Section::make()->schema([
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
                        ])
                            ->columns(1)
                            ->columnSpan(1)
                            ->description('Основні Налаштування'),

                        Section::make()->schema([
                            Forms\Components\ColorPicker::make('banner_btn_text_color')
                                ->label('Колір Тексту')
                                ->required(),
                            Forms\Components\ColorPicker::make('banner_btn_color_hover')
                                ->label('Колір Наведення')
                                ->required(),
                            Forms\Components\ColorPicker::make('banner_btn_color')
                                ->label('Колір Тексту При Наведенні')
                                ->rgba()
                                ->required(),
                        ])
                            ->columns(1)
                            ->columnSpan(1)
                            ->description('Вигляд кнопки банеру')
                    ]),

                    Forms\Components\Grid::make()->schema([
                        Forms\Components\Section::make()->schema([
                            Forms\Components\ColorPicker::make('color_1')
                                ->label('Колір 1')
                                ->hint('Шапка, підвал, Проект (полоса), FAQ фон, Кнопка Call фон')
                                ->required(),
                            Forms\Components\ColorPicker::make('color_2')
                                ->label('Колір 2')
                                ->hint('Тариф колір зебри')
                                ->required(),
                            Forms\Components\ColorPicker::make('color_3')
                                ->label('Колір 3')
                                ->hint('Тариф фон')
                                ->required(),
                            Forms\Components\ColorPicker::make('color_5')
                                ->label('Колір 5')
                                ->hint('Фон сторінки, фон наведення на кнопки')
                                ->required(),
                            Forms\Components\ColorPicker::make('color_text_1')
                                ->label('Колір 6')
                                ->hint('Колір тексту, тіні та іконок')
                                ->required(),
                        ])
                            ->columns(1)
                            ->columnSpan(1)
                            ->description('Світла сторона')
                        ,
                        Forms\Components\Section::make()->schema([
                            Forms\Components\ColorPicker::make('dark_color_1')
                                ->label('Колір 1')
                                ->hint('Шапка, підвал, Проект (полоса), FAQ фон, Кнопка Call фон')
                                ->required(),
                            Forms\Components\ColorPicker::make('dark_color_2')
                                ->label('Колір 2')
                                ->hint('Тариф колір зебри')
                                ->required(),
                            Forms\Components\ColorPicker::make('dark_color_3')
                                ->label('Колір 3')
                                ->hint('Тариф фон')
                                ->required(),
                            Forms\Components\ColorPicker::make('dark_color_5')
                                ->label('Колір 5')
                                ->hint('Фон сторінки, фон наведення на кнопки')
                                ->required(),
                            Forms\Components\ColorPicker::make('dark_color_text_1')
                                ->label('Колір 6')
                                ->hint('Колір тексту, тіні та іконок')
                                ->required(),
                        ])
                            ->columns(1)
                            ->columnSpan(1)
                            ->description('Темна сторона'),

                    ])
                ])
            ]);
    }
}


