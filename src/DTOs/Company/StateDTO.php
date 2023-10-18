<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use ForestLynx\DaData\Casts\ConvertDateIsNumberToString;
use DateTime;
use ForestLynx\DaData\Enums\CompanyStatus;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class StateDTO extends Data
{
    public function __construct(
        #[WithCast(EnumCast::class, type: CompanyStatus::class)]
        public readonly ?CompanyStatus $status,
        public readonly ?string $code,
        #[WithCast(ConvertDateIsNumberToString::class)]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd.m.Y')]
        public readonly ?DateTime $actuality_date,
        #[WithCast(ConvertDateIsNumberToString::class)]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd.m.Y')]
        public readonly ?DateTime $registration_date,
        #[WithCast(ConvertDateIsNumberToString::class)]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd.m.Y')]
        public readonly ?DateTime $liquidation_date
    ) {
    }
}
