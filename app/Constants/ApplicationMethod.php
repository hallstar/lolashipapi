<?php

namespace App\Constants;

class ApplicationMethod
{
    const ELECTRONIC = 'Electronic';

    const PRINT = 'Print';

    public static $methods = [
        self::ELECTRONIC,
        self::PRINT,
    ];
}