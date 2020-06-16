<?php

namespace App\Constants;

class ApplicationEntryType
{
    const ONLINE = 'Online';

    const MANUAL = 'Manual';

    public static $methods = [
        self::ONLINE,
        self::MANUAL,
    ];
}