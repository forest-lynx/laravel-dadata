<?php

declare(strict_types=1);

namespace ForestLynx\DaData\Casts;

use Spatie\LaravelData\Casts\Cast;
use ForestLynx\DaData\DTOs\Company\FioDTO;
use Spatie\LaravelData\Support\DataProperty;

class ConvertFioToDtoCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): FioDTO
    {
        return FioDTO::from($this->convert($value));
    }

    private function convert(string $fio): array
    {
        [$surname, $name, $patronymic] = str($fio)->trim()->title()->explode(' ', 3);

        return compact('surname', 'name', 'patronymic');
    }
}
