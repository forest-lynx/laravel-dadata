<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use App\Services\DaData\Company\Casts\ConvertDateIsNumberToString;
use Carbon\CarbonImmutable;
use DateTime;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class DocumentItemDTO extends Data
{
    public function __construct(
        public readonly ?string $category,
        public readonly ?string $type,
        public readonly null $series,
        public readonly null $number,
        //#[WithCast(ConvertDateIsNumberToString::class)]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd.m.Y')]
        public readonly ?CarbonImmutable $issue_date,
        public readonly null $issue_authority
    ) {
    }
}
