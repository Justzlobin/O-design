<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageGeneral extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $navigationLabel = 'Загальні налаштування';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('site_name')
                    ->label('Імя Сайту')
                    ->required(),
                Forms\Components\TextInput::make('menu_gradient')
                    ->label('Градієнт меню'),
                Forms\Components\TextInput::make('tel')
                    ->label('Телефон')
                    ->tel(),
                Forms\Components\TextInput::make('slogan')
                    ->label('Девіз')
                    ->maxLength(55)
                    ->required(),
                Forms\Components\TextInput::make('chat_id')
                    ->numeric()
                    ->required()
            ]);
    }
}
