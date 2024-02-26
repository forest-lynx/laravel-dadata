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
 * @method \ForestLynx\DaData\DaDataCompany prompt(
 * string $comapny,
 * int $count,
 * array|Collection $status,
 * CompanyType $type
 * string $locations,
 * string $locations_boost
 * )
 */
class DaDataCompany extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'da_data_company';
    }
}
