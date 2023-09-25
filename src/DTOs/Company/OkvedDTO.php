<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use Spatie\LaravelData\Data;

class OkvedDTO extends Data
{
    public function __construct(
        public readonly ?bool $main,
        public readonly ?string $type,
        public readonly ?string $code,
        public readonly ?string $name
    ) {
    }
}
