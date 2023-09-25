<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use Spatie\LaravelData\Data;

class InnOgrnNameDTO extends Data
{
    public function __construct(
        public readonly ?string $inn,
        public readonly ?string $ogrn,
        public readonly ?string $name
    ) {
    }
}
