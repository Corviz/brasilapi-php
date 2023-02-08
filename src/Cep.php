<?php

namespace Corviz\BrasilAPI;

use Corviz\BrasilAPI\Data\CepData;
use Corviz\BrasilAPI\Data\GeoLocationData;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class Cep extends ApiConsumer
{
    /**
     * Fetch CEP (ZIP) code info without coordinates.
     *
     * @param string $number
     * @return CepData|null
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function get(string $number, bool $withLocation = false): ?CepData
    {
        $version = $withLocation ? 'v2' : 'v1';
        $response = static::getClient()->get("cep/$version/$number");
        $data = null;

        if ($responseData = self::parseJson($response)) {
            if (!empty($responseData['location'])) {
                $responseData['location'] = GeoLocationData::from($responseData['location']['coordinates']);
            }

            $data = CepData::from($responseData);
        }

        return $data;
    }
}
