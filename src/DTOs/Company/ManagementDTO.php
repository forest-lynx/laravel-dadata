<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use ForestLynx\DaData\Casts\ConvertFioToDtoCast;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class ManagementDTO extends Data
{
    public function __construct(
        #[WithCast(ConvertFioToDtoCast::class)]
        public readonly ?FioDTO $name,
        public readonly ?string $post,
        public readonly null $disqualified
    ) {
    }
}
