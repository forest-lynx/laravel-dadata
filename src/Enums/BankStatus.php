<?php

namespace ForestLynx\DaData\Enums;

use ForestLynx\DaData\Traits\Enum;

enum BankStatus: string
{
    use Enum;

    case ACTIVE        = 'ACTIVE';
    case LIQUIDATING   = 'LIQUIDATING';
    case LIQUIDATED    = 'LIQUIDATED';
}
