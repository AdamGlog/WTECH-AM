<?php

namespace App\Enums;

enum TypDorucenia: string {
    case KURIER = 'kurier';
    case POSTA = 'posta';
    case OSOBNY_ODBER = 'osobny_odber';
    
}