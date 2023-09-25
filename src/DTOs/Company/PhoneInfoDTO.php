<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use Spatie\LaravelData\Data;

class PhoneInfoDTO extends Data
{
    public function __construct(
        public readonly null $contact,
        public readonly ?string $source,
        public readonly null $qc,
        public readonly ?string $type,
        public readonly ?string $number,
        public readonly null $extension,
        public readonly ?string $provider,
        public readonly null $country,
        public readonly ?string $region,
        public readonly null $city,
        public readonly ?string $timezone,
        public readonly ?string $country_code,
        public readonly ?string $city_code,
        public readonly null $qc_conflict
    ) {
    }
}
