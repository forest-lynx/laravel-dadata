<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use DateTime;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use ForestLynx\DaData\Casts\ConvertDateIsNumberToString;
use ForestLynx\DaData\Enums\BranchType;
use ForestLynx\DaData\Enums\CompanyType;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

class CompanyDTO extends Data
{
    public function __construct(
        public readonly ?string $kpp,
        public readonly ?TypeValueDTO $capital,
        //Признак недостоверных сведений об организации
        public readonly true|null $invalid,
        public readonly ?ManagementDTO $management,
        #[DataCollectionOf(FounderDTO::class)]
        public readonly ?DataCollection $founders,
        #[DataCollectionOf(ManagerDTO::class)]
        public readonly ?DataCollection $managers,
        //Правопредшественники, только для юрлиц
        #[DataCollectionOf(InnOgrnNameDTO::class)]
        public readonly ?DataCollection $predecessors,
        //Правопреемники, только для юрлиц
        #[DataCollectionOf(InnOgrnNameDTO::class)]
        public readonly ?DataCollector $successors,
        #[WithCast(EnumCast::class)]
        public readonly ?BranchType $branch_type,
        public readonly ?int $branch_count,
        public readonly ?string $hid,
        #[WithCast(EnumCast::class)]
        public readonly ?CompanyType $type,
        public readonly ?StateDTO $state,
        public readonly ?OpfDTO $opf,
        public readonly ?NameDTO $name,
        public readonly ?string $inn,
        public readonly ?string $ogrn,
        public readonly ?string $okpo,
        public readonly ?string $okato,
        public readonly ?string $oktmo,
        public readonly ?string $okogu,
        public readonly ?string $okfs,
        public readonly ?string $okved,
        #[DataCollectionOf(OkvedDTO::class)]
        public readonly ?DataCollection $okveds,
        public readonly ?AuthoriteDTO $authorities,
        public readonly ?DocumentDTO $documents,
        #[DataCollectionOf(LicenseDTO::class)]
        public readonly ?DataCollection $licenses,
        public readonly ?FinanceDTO $finance,
        public readonly ?AddressDataDTO $address,
        #[DataCollectionOf(PhoneDTO::class)]
        public readonly ?DataCollection $phones,
        #[DataCollectionOf(EmailDTO::class)]
        public readonly ?DataCollection $emails,
        #[WithCast(ConvertDateIsNumberToString::class)]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd.m.Y')]
        public readonly ?DateTime $ogrn_date,
        public readonly ?string $okved_type,
        public readonly ?int $employee_count,
        //не заполняется
        public readonly ?string $source = null,
        public readonly ?string $qc = null
    ) {
    }
}
