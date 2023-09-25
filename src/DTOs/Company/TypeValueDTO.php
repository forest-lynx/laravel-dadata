<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use Spatie\LaravelData\Data;

class TypeValueDTO extends Data
{
    public function __construct(
        public readonly ?string $type,
        public readonly ?int $value
    ) {
    }
}
