<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use ForestLynx\DaData\DTOs\Address\AddressDTO;
use Spatie\LaravelData\Data;

class AddressDataDTO extends Data
{
    public function __construct(
        public readonly ?string $value,
        public readonly ?string $unrestricted_value,
        public readonly true|null $invalidity,
        public readonly ?AddressDTO $data
    ) {
    }
}
