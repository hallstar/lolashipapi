<?php

namespace App\Constants;

class OfferStatus
{
    const PREOPEN   = 'Pre-open';

    const OPEN      = 'Open';

    const CLOSED    = 'Closed';

    public static $methods = [
        self::PREOPEN,
        self::OPEN,
        self::CLOSED,
    ];
}