<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Bank;

use Spatie\LaravelData\Data;

class BankDTO extends Data
{
    public function __construct(
        public readonly ?string $value,
        public readonly ?string $unrestricted_value,
        public readonly ?BankDataDTO $data
    ) {
    }
}
