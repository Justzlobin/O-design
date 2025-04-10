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
                        ->dehydrateStateUsing(fn ($state) => str_replace('@', '<wbr>@', $state))
                        ->formatStateUsing(fn ($state) => str_replace('<wbr>@', '@', $state))
                        ->email()
                        ->required(),
                    Forms\Components\ColorPicker::make('color_1')
                        ->label('Колір 1')
                        ->hint('Початково - білий')
                        ->default('#fff')
                        ->required(),
                    Forms\Components\ColorPicker::make('color_2')
                        ->label('Колір 2')
                        ->hint('Початково - Чорний')
                        ->default('#000')
                        ->required(),
                    Forms\Components\ColorPicker::make('color_2_transparent')
                        ->label('Колір 2 - прозорий')
                        ->default('#000')
                        ->rgba()
                        ->required(),
                ])
            ]);
    }
}
