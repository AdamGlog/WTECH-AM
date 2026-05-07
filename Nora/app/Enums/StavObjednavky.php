<?php

namespace App\Enums;

enum StavObjednavky: string {
    case NOVA = 'nova';
    case SPRACOVAVANA = 'spracovavana';
    case ODOSLANA = 'odoslana';
    case DORUCENA = 'dorucena';
    case ZRUSENA = 'zrusena';
}