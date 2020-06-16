<?php

namespace App\Constants;

class OfferType
{
    const LAND   = 'Land';

    const RESIDENTIAL  = 'Residential';

    const COMMERCIAL  = 'Commercial';

    const INDUSTRIAL  = 'Industrial';

    public static $methods = [
        self::LAND,
        self::RESIDENTIAL,
        self::COMMERCIAL,
        self::INDUSTRIAL,
    ];
}
