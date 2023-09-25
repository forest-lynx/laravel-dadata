<?php

namespace ForestLynx\DaData\Enums;

use ForestLynx\DaData\Traits\Enum;

enum CompanyType: string
{
    use Enum;

    case LEGAL      = 'LEGAL';
    case INDIVIDUAL = 'INDIVIDUAL';
}
