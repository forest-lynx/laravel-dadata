<?php

namespace ForestLynx\DaData\Enums;

use ForestLynx\DaData\Traits\Enum;

enum Language: string
{
    use Enum;

    case RU = 'RU';
    case EN = 'EN';
}
