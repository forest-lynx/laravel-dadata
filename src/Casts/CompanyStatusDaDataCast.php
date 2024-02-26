<?php

declare(strict_types=1);

namespace App\Services\DaData\Company\Casts;

use ForestLynx\DaData\Enums\CompanyStatus;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class CompanyStatusDaDataCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): CompanyStatus
    {
        foreach (CompanyStatus::cases() as $status) {
            if ($value === $status->name) {
                return CompanyStatus::from($status->value);
            }
        }
    }
}
