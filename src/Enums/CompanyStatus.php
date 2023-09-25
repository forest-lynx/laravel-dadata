<?php

namespace ForestLynx\DaData\Enums;

use ForestLynx\DaData\Traits\Enum;

enum CompanyStatus: string
{
    use Enum;

    case ACTIVE        = 'ACTIVE';
    case LIQUIDATING   = 'LIQUIDATING';
    case LIQUIDATED    = 'LIQUIDATED';
}
