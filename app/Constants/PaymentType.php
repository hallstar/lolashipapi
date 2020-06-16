<?php

namespace App\Constants;

class PaymentType
{
    const CHEQUE   = 'Cheque';

    public static $methods = [
        self::CHEQUE,
    ];
}