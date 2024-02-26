<?php

declare(strict_types=1);

namespace ForestLynx\DaData\Casts;

use DateTime;
use DateTimeZone;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class ConvertDateIsNumberToString implements Cast
{
    public function __construct(
        protected ?string $setTimeZone = null
    ) {
    }

    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): DateTime
    {
        $value = $value / 1000;

        $date = date_timestamp_set(new DateTime(), $value);

        if ($this->setTimeZone) {
            $date->setTimezone(new DateTimeZone($this->setTimeZone));
        }

        return $date;
    }
}
