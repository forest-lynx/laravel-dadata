<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use Spatie\LaravelData\Data;

class FinanceDTO extends Data
{
    public function __construct(
        public readonly null $tax_system,
        public readonly ?int $income,
        public readonly ?int $expense,
        public readonly null $debt,
        public readonly null $penalty,
        public readonly ?int $year
    ) {
    }
}
