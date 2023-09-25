<?php

namespace ForestLynx\DaData\Enums;

use ForestLynx\DaData\Traits\Enum;

enum Gender: string
{
    use Enum;

    case UNKNOWN   = 'UNKNOWN';
    case MALE      = 'MALE';
    case FEMALE    = 'FEMALE';
}
