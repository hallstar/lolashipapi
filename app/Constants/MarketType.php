<?php

namespace App\Constants;

class MarketType
{
    const PUBLIC   = 'Public';

    const PRIVATE  = 'Private';

    public static $methods = [
        self::PUBLIC,
        self::PRIVATE,
    ];
}