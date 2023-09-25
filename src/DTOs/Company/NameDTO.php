<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use Spatie\LaravelData\Data;

class NameDTO extends Data
{
    public function __construct(
        public readonly ?string $full_with_opf,
        public readonly ?string $short_with_opf,
        public readonly ?string $latin,
        public readonly ?string $full,
        public readonly ?string $short
    ) {
    }
}
