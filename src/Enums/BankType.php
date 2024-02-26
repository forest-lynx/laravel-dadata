<?php

namespace ForestLynx\DaData\Enums;

use ForestLynx\DaData\Traits\Enum;

enum BankType: string
{
    use Enum;

    case BANK          = 'BANK'; // Банк
    case BANK_BRANCH   = 'BANK_BRANCH'; // Филиал банка
    case NKO           = 'NKO'; // небанковская кредитная организация
    case NKO_BRANCH    = 'NKO_BRANCH'; // филиал небанковской кредитной организации
    case RKC           = 'RKC'; // расчетно-кассовый центр
    case CBR           = 'CBR'; //управление ЦБ РФ
    case TREASURY      = 'TREASURY'; // управление Казначейства
    case OTHER         = 'OTHER'; // другой
}
