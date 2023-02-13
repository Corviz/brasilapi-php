<?php

namespace Corviz\BrasilAPI\Utils;

/**
 * @internal
 */
class Str
{
    /**
     * @param string $value
     * @param string $separator
     * @return string
     */
    public static function toCamelCase(string $value, string $separator = '_'): string
    {
        return str_replace($separator, '', lcfirst(ucwords($value, $separator)));
    }
}
