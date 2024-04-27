<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Bank;

use ForestLynx\DaData\DTOs\Address\AddressDTO;
use Spatie\LaravelData\Data;

class BankDataDTO extends Data
{
    public function __construct(
        //Банковский идентификационный код (БИК) ЦБ РФ
        public readonly ?string $bic,
        //Банковский идентификационный код в системе SWIFT
        public readonly ?string $swift,
        public readonly ?string $inn,
        public readonly ?string $kpp,
        //Регистрационный номер в ЦБ РФ
        public readonly ?string $registration_number,
        // Корреспондентский счет в ЦБ РФ
        public readonly ?string $correspondent_account,
        // Казначейские счета(для УФК)
        public readonly ?array $treasury_accounts,
        // Город для платежного поручения(поля справочника Tnp + Nnp)
        public readonly ?string $payment_city,
        public readonly ?BankNameDTO $name,
        //Тип кредитной организации
        public readonly ?BankOpfDTO $opf,
        //Управление ЦБ РФ, к которому относится банк
        public readonly ?BankCbrDTO $cbr,
        //Адрес регистрации
        public readonly ?BankAddressDTO $address,
        // Состояние
        public readonly ?BankStateDTO $state,
    ) {
    }
}
