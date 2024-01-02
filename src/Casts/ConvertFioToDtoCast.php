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
        $fio_data = str($fio)->trim()->title()->explode(' ', 3);

        $surname = $fio_data[0] ?? '';
        $name = $fio_data[1] ?? '';
        $patronymic = $fio_data[2] ?? '';
        
        return compact('surname', 'name', 'patronymic');
    }
}
