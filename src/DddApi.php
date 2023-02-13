<?php

namespace Corviz\BrasilAPI;

use Corviz\BrasilAPI\Data\DddApi\DddData;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class DddApi extends ApiConsumer
{
    /**
     * @param int $ddd
     * @return DddData|null
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function get(int $ddd): ?DddData
    {
        $response = static::getClient()->get("ddd/v1/$ddd");
        $data = null;

        if ($responseData = self::parseJson($response)) {
            $data = DddData::from($responseData);
        }

        return $data;
    }
}