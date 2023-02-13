<?php

namespace Corviz\BrasilAPI\Data\HolidayApi;

use Corviz\BrasilAPI\Data\BaseData;
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