<?php

declare(strict_types=1);

namespace ForestLynx\DaData\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class DaDataAddress
 * @package ForestLynx\DaData\Facades
 * @method \ForestLynx\DaData\DaDataAddress
 */
class DaDataAddress extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'da_data_address';
    }
}
