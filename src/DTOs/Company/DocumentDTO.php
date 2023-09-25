<?php

declare(strict_types=1);

namespace ForestLynx\DaData\DTOs\Company;

use Spatie\LaravelData\Data;

class DocumentDTO extends Data
{
    public function __construct(
        public readonly ?DocumentItemDTO $fts_registration,
        public readonly ?DocumentItemDTO $fts_report,
        public readonly ?DocumentItemDTO $pf_registration,
        public readonly ?DocumentItemDTO $sif_registration,
        public readonly ?DocumentItemDTO $smb
    ) {
    }
}
