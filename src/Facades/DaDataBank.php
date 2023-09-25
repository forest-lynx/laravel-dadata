<?php

declare(strict_types=1);

namespace ForestLynx\DaData\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class DaDataBank
 * @package ForestLynx\DaData\Facades
 * @method \ForestLynx\DaData\DaDataBank
 */
class DaDataBank extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'da_data_bank';
    }
}
