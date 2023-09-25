<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use Spatie\LaravelData\Data;

class FioDTO extends Data
{
    public function __construct(
        public readonly ?string $surname,
        public readonly ?string $name,
        public readonly ?string $patronymic,
        public readonly ?string $gender,
        public readonly ?string $source,
        public readonly ?int $qc
    ) {
    }
}
