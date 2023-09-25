<?php

namespace ForestLynx\DaData\Enums;

use ForestLynx\DaData\Traits\Enum;

enum BankType: string
{
    use Enum;

    case BANK          = 'BANK';
    case NKO           = 'NKO';
    case BANK_BRANCH   = 'BANK_BRANCH';
    case NKO_BRANCH    = 'NKO_BRANCH';
    case RKC           = 'RKC';
    case OTHER         = 'OTHER';
}
