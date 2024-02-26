<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Bank;

use Spatie\LaravelData\Data;

class BankNameDTO extends Data
{
    public function __construct(
        //платежное наименование
        public readonly ?string $payment,
        // не заполняется
        public readonly ?string $full,
        // краткое наименование
        public readonly ?string $short
    ) {
    }
}
