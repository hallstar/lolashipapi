<?php

namespace App\Constants;

class ApplicationType
{
    const INDIVIDUAL    = 'Individual';

    const CORPORATION   = 'Corporation';

    public static $methods = [
        self::INDIVIDUAL,
        self::CORPORATION,
    ];
}