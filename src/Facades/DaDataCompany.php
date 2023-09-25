<?php

declare(strict_types=1);

namespace ForestLynx\DaData\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class DaDataCompany
 * @package ForestLynx\DaData\Facades
 * @method \ForestLynx\DaData\DaDataCompany innOrOgrn(
 * string $innOrOgrn,
 * int $count,
 * string $kpp,
 * BranchType $branch_type,
 * CompanyType $type)
 */
class DaDataCompany extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'da_data_company';
    }
}
