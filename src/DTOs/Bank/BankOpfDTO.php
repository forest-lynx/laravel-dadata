<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Bank;

use ForestLynx\DaData\Enums\BankType;
use Spatie\LaravelData\Data;

class BankOpfDTO extends Data
{
    public function __construct(
        public readonly ?BankType $type,
        // не заполняется
        public readonly ?string $full,
        // не заполняется
        public readonly ?string $short
    ) {
    }
}
