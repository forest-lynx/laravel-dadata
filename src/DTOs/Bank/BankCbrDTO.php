<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Bank;

use ForestLynx\DaData\DTOs\Address\AddressDTO;
use Spatie\LaravelData\Data;

class BankCbrDTO extends Data
{
    public function __construct(
        //наименование управления ЦБ РФ
        public readonly ?BankNameDTO $payment,
        public readonly ?string $bic,
        public readonly ?AddressDTO $value
    ) {
    }
}
