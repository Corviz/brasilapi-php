<?php

namespace Corviz\BrasilAPI\Data\HolidayApi;

use Corviz\BrasilAPI\Data\DataTransfer;
use DateTimeImmutable;

class HolidayData extends DataTransfer
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