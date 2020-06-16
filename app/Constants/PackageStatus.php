<?php

namespace App\Constants;

class PackageStatus
{
    const DELAYED   = 'Delayed';
    const READY   = 'Ready';
    const SHIPPED   = 'Shipped';
    const DELIVERED   = 'Delivered';

    public static $methods = [
        self::DELAYED,
        self::READY,
        self::SHIPPED,
        self::DELIVERED,
    ];
}