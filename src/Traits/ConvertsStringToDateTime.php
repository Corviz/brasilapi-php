<?php

namespace Corviz\BrasilAPI\Traits;

use DateTimeImmutable;

trait ConvertsStringToDateTime
{
    /**
     * @param string $value
     * @param string $format
     * @return DateTimeImmutable
     */
    protected static function convertDateStrToDateTime(string $value, string $format = 'Y-m-d'): DateTimeImmutable
    {
        return DateTimeImmutable::createFromFormat(
            "$format P", $value.' -03:00'
        );
    }

    /**
     * @param string $value
     * @param string $format
     * @return DateTimeImmutable
     */
    protected static function convertDateTimeStrToDateTime(string $value, string $format = 'Y-m-d H:i:s'): DateTimeImmutable
    {
        return self::convertDateStrToDateTime($value, $format);
    }
}