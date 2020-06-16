<?php

namespace App\Constants;

class RefundType
{
    const BANK      = 'Bank';

    const BROKER    = 'Broker';

    public static $methods = [
        self::BANK,
        self::BROKER,
    ];
}