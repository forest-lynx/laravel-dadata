<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use Spatie\LaravelData\Data;

class AuthoriteDTO extends Data
{
    public function __construct(
        public readonly ?AuthoriteItemDTO $fts_registration,
        public readonly ?AuthoriteItemDTO $fts_report,
        public readonly ?AuthoriteItemDTO $pf,
        public readonly ?AuthoriteItemDTO $sif
    ) {
    }
}
