<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Bank;

use DateTime;
use ForestLynx\DaData\Casts\ConvertDateIsNumberToString;
use ForestLynx\DaData\Enums\CompanyStatus;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class BankStatusDTO extends Data
{
    public function __construct(
        #[WithCast(ConvertDateIsNumberToString::class)]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd.m.Y')]
        public readonly ?DateTime $actuality_date,
        #[WithCast(ConvertDateIsNumberToString::class)]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd.m.Y')]
        public readonly ?DateTime $registration_date,
        #[WithCast(ConvertDateIsNumberToString::class)]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd.m.Y')]
        public readonly ?DateTime $liquidation_date,
        public readonly ?CompanyStatus $status,
    ) {
    }
}
