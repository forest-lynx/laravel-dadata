<?php

namespace ForestLynx\DaData\Enums;

use ForestLynx\DaData\Traits\Enum;

enum BranchType: string
{
    use Enum;

    case MAIN   = 'MAIN';
    case BRANCH = 'BRANCH';
}
