<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use Spatie\LaravelData\Data;

class FounderDTO extends Data
{
    public function __construct(
        public readonly ?string $inn,
        public readonly ?FioDTO $fio,
        public readonly ?string $hid,
        public readonly ?string $type,
        public readonly ?TypeValueDTO $share,
        public readonly true|null $invalidity
    ) {
    }
}
