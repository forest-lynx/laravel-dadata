<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use Spatie\LaravelData\Data;

class AuthoriteItemDTO extends Data
{
    public function __construct(
        public readonly ?string $type,
        public readonly ?string $code,
        public readonly ?string $name,
        public readonly ?string $address
    ) {
    }
}
