<?php

namespace Corviz\BrasilAPI\Data;

use DateTimeImmutable;

class HolidayData extends BaseData
{
    /**
     * @param DateTimeImmutable $date
     * @param string $name
     * @param string $type
     */
    public function __construct(
        public readonly DateTimeImmutable $date,
        public readonly string $name,
        public readonly string $type,
        public readonly ?string $fullName = null,
    ) {
    }
}