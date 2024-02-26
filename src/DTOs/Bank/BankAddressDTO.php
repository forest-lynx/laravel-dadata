<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Bank;

use ForestLynx\DaData\DTOs\Address\AddressDTO;
use Spatie\LaravelData\Data;

class BankAddressDTO extends Data
{
    public function __construct(
        //наименование управления ЦБ РФ
        public readonly ?string $value,
        public readonly ?string $unrestricted_value,
        public readonly ?AddressDTO $data
    ) {
    }
}
