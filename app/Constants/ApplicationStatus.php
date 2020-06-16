<?php

namespace App\Constants;

class ApplicationStatus
{
    const DRAFT         = 'Draft';

    const PENDING       = 'Pending';

    const APPROVED      = 'Approved';

    const REJECTED      = 'Rejected';

    public static $methods = [
        self::DRAFT,
        self::PENDING,
        self::APPROVED,
        self::REJECTED,
    ];
}