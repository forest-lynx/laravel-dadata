<?php

namespace ForestLynx\DaData\Traits;

trait Enum
{
    /**
     * Return array of values
     *
     * @param array $casts
     * @return array
     */
    public function values(array $casts): array
    {
        $values = [];

        foreach ($casts as $cast) {
            $values[] = $cast->value;
        }

        return $values;
    }
}
