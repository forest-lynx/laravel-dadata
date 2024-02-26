<?php

declare(strict_types=1);

namespace ForestLynx\DaData;

use ForestLynx\DaData\DTOs\Company\CompanyDataDTO;
use ForestLynx\DaData\Enums\BranchType;
use ForestLynx\DaData\Enums\CompanyScope;
use ForestLynx\DaData\Enums\CompanyStatus;
use ForestLynx\DaData\Enums\CompanyType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;

/**
 * Class DaDataPhone
 * @package ForestLynx\DaData
 */
class DaDataCompany extends DaDataService
{
    /**
     * Поиск организации по ИНН или ОГРН
     * @throws \Exception
     */
    public function innOrOgrn(
        string $innOrOgrn,
        int $count = 10,
        string $kpp = null,
        BranchType $branch_type = null,
        CompanyType $type = null
    ): Collection {

        $data = $this->suggestApi()->post('rs/findById/party', [
            'query'             => $innOrOgrn,
            'count'             => $count,
            'kpp'               => $kpp,
            'branch_type'       => $branch_type?->value ?? '',
            'type'              => $type?->value ?? '',
        ]);
        return $this->collection(CompanyDataDTO::collect($data['suggestions']));
    }

    /**
     * Подстановка компания по названию компании
     *
     * Помогает человеку быстро ввести подробную информацию о компании в веб-форму или приложение.
     *
     * @throws \Exception
     */
    public function prompt(
        string $company,
        int $count = 10,
        array|Collection $status = [],
        CompanyType $type = null,
        string $locations = null,
        string $locations_boost = null
    ): Collection {
        $status = \collect($status);
        /*for ($i = 0; $i < count($status); $i++) {
            if (CompanyStatus::$map[$status[$i]]) {
                $status[$i] = CompanyStatus::$map[$status[$i]];
            } else {
                unset($status[$i]);
            }
        }*/

        $locations_array = [];
        if (! is_null($locations)) {
            for ($i = 0; $i < count(explode(',', $locations)); $i++) {
                array_push($locations_array, ['kladr_id' => trim($locations[$i])]);
            }
        }

        $locations_boost_array = [];
        if (! is_null($locations_boost)) {
            for ($i = 0; $i < count(explode(',', $locations_boost)); $i++) {
                array_push($locations_boost_array, ['kladr_id' => trim($locations_boost[$i])]);
            }
        }

        $data = $this->suggestApi()->post('rs/suggest/party', [
            'query'             => $company,
            'count'             => $count,
            'status'            => array_values($status->toArray()),
            'type'              => $type?->value ?? null,
            'locations'         => $locations_array,
            'locations_boost'   => $locations_boost_array,
        ]);

        return $this->collection(CompanyDataDTO::collect($data['suggestions']));
    }

    /**
     * Найти аффилированные компании
     *
     * @param string $id
     * @param int $count
     * @param array $scope
     * @return array
     * @throws \Exception
     */
    /*public function affiliated(string $id, int $count = 10, array $scope = [CompanyScope::FOUNDERS]): array
    {
        for ($i = 0; $i < count($scope); $i++) {
            if (CompanyScope::$map[$scope[$i]]) {
                $scope[$i] = CompanyScope::$map[$scope[$i]];
            } else {
                unset($scope[$i]);
            }
        }

        return $this->suggestApi()->post('rs/findAffiliated/party', [
            'query'             => $id,
            'count'             => $count,
            'scope'             => array_values($scope),
        ]);
    }*/

}
