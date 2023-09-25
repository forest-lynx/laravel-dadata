<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use Spatie\LaravelData\Data;

class EmailInfoDTO extends Data
{
    public function __construct(
        public readonly ?string $local,
        public readonly ?string $domain,
        public readonly null $type,
        public readonly ?string $source,
        public readonly null $qc
    ) {
    }
}
