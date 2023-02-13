<?php

namespace Corviz\BrasilAPI\Traits;

use Corviz\BrasilAPI\Utils\Str;

trait ConvertsSnakeKeysToCamel
{
    /**
     * @param array $original
     * @return array
     */
    protected static function snakeToCamelKeys(array $original): array
    {
        $aux = [];

        foreach ($original as $key => $value) {
            if (is_array($value)) {
                $value = self::snakeToCamelKeys($value);
            }

            $aux[Str::toCamelCase($key)] = $value;
        }

        return $aux;
    }
}