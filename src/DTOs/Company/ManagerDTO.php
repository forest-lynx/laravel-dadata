<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use Spatie\LaravelData\Data;

class ManagerDTO extends Data
{
    public function __construct(
        public readonly ?string $inn,
        public readonly ?FioDTO $fio,
        public readonly ?string $post,
        public readonly ?string $hid,
        public readonly ?string $type,
        public readonly null $invalidity
    ) {
    }
}
