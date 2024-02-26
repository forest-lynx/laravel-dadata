<?php

namespace ForestLynx\DaData\Traits;

trait Enum
{
    public function values(array $casts): array
    {
        $values = [];

        foreach ($casts as $cast) {
            $values[] = $cast->value;
        }

        return $values;
    }
}
