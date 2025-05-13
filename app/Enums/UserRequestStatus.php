<?php

namespace App\Enums;

enum UserRequestStatus: string
{
    case New = 'new';
    case Processed = 'processed';
    case Rejected = 'rejected';
}
