<?php

namespace App\Enums;

enum ApiStatusEnum: string
{
    case SUCCESS    = 'success';
    case WARNING    = 'warning';
    case ERROR      = 'error';
}
