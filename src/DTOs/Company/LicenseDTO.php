<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use App\Services\DaData\Company\Casts\ConvertDateIsNumberToString;
use DateTime;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class LicenseDTO extends Data
{
    public function __construct(
        public readonly ?string $series,
        public readonly ?string $number,
        #[WithCast(ConvertDateIsNumberToString::class)]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd.m.Y')]
        public readonly ?DateTime $issue_date,
        public readonly ?string $issue_authority,
        #[WithCast(ConvertDateIsNumberToString::class)]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd.m.Y')]
        public readonly ?DateTime $suspend_date,
        public readonly ?string $suspend_authority,
        #[WithCast(ConvertDateIsNumberToString::class)]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd.m.Y')]
        public readonly ?DateTime $valid_from,
        #[WithCast(ConvertDateIsNumberToString::class)]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd.m.Y')]
        public readonly ?DateTime $valid_to,
        public readonly ?array $activities,
        public readonly ?array $addresses,
    ) {
    }
}
