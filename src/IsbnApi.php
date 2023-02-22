<?php

namespace Corviz\BrasilAPI;

use Corviz\BrasilAPI\Data\IsbnApi\DimensionData;
use Corviz\BrasilAPI\Data\IsbnApi\IsbnData;
use Corviz\BrasilAPI\Data\IsbnApi\RetailPriceData;
use Corviz\BrasilAPI\Traits\ConvertsSnakeKeysToCamel;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class IsbnApi extends ApiConsumer
{
    use ConvertsSnakeKeysToCamel;

    /**
     * @param string $isbn
     * @return IsbnData|null
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function get(string $isbn): ?IsbnData
    {
        $response = static::getClient()->get("isbn/v1/$isbn");
        $data = null;

        if ($responseData = self::parseJson($response)) {
            $responseData = self::snakeToCamelKeys($responseData);

            if (!empty($responseData['dimensions'])) {
                $responseData['dimensions'] = DimensionData::from($responseData['dimensions']);
            }

            if (!empty($responseData['retailPrice'])) {
                $responseData['retailPrice'] = RetailPriceData::from($responseData['retailPrice']);
            }

            $data = IsbnData::from($responseData);
        }

        return $data;
    }
}
