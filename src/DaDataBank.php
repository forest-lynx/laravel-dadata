<?php

namespace ForestLynx\DaData;

use ForestLynx\DaData\DTOs\Bank\BankDTO;
use ForestLynx\DaData\Enums\BankStatus;
use ForestLynx\DaData\Enums\BankType;
use Illuminate\Support\Collection;

/**
 * Class DaDataBank
 * @package ForestLynx\DaData
 */
class DaDataBank extends DaDataService
{
    /**
     * Find bank by BIC, SWIFT, TIN or registration number
     *
     * @param string $bank
     * @return array
     * @throws \Exception
     */
    public function id(string $bank): Collection
    {
        $data = $this->suggestApi()->post('rs/findById/bank', ['query' => $bank]);

        return $this->collection(BankDTO::collect($data['suggestions']));
    }

    /**
     * Prompt bank by part of the ID
     *
     * @param string $company
     * @param int $count
     * @param array $status
     * @param array $type
     * @param string|null $locations
     * @param string|null $locations_boost
     * @return array
     * @throws \Exception
     */
    public function prompt(
        string $company,
        ?int $count = 10,
        null|array|Collection $status = [],
        null|array|BankType $type = null,
        ?string $locations = null,
        ?string $locations_boost = null
    ): Collection {
        $status = collect($status)->values()->toArray();

        if($type instanceof BankType){
            $type = [$type->value];
        } else {
            $type = collect($type)->transform(
                fn($t) => $t instanceof BankType
                ? $t->name
                : $t
            )->filter()->values()->toArray();
        }

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

        $data = $this->suggestApi()->post('rs/suggest/bank', [
            'query'             => $company,
            'count'             => $count,
            'status'            => $status,
            'type'              => $type,
            'locations'         => $locations_array,
            'locations_boost'   => $locations_boost_array,
        ]);

        return $this->collection(BankDTO::collect($data['suggestions']));
    }
}
