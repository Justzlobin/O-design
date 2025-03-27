<?php

namespace App\Enums;

enum ProjectType :string
{
    case Privat = 'privat';
    case Commercial = 'commercial';

    public static function isValid(string $value): bool
    {
        return in_array($value, array_column(self::cases(), 'value'), true);
    }
}

