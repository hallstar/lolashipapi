<?php

namespace App\Constants;

class FeeType
{
    const FLAT   = 'Flat';

    const PERCENTAGE  = 'Percentage';

    public static $methods = [
        self::FLAT,
        self::PERCENTAGE,
    ];
}