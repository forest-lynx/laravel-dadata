<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use Spatie\LaravelData\Data;

class PhoneDTO extends Data
{
    public function __construct(
        public readonly ?string $value,
        public readonly ?string $unrestricted_value,
        public readonly ?PhoneInfoDTO $data
    ) {
    }
}
