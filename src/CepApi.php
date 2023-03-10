<?php

namespace Corviz\BrasilAPI;

use Corviz\BrasilAPI\Data\CepApi\CepData;
use Corviz\BrasilAPI\Data\CepApi\CoordinatesData;
use Corviz\BrasilAPI\Data\CepApi\LocationData;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class CepApi extends ApiConsumer
{
    /**
     * Fetch CEP (ZIP) code info without coordinates.
     *
     * @param string $number
     * @param bool $withLocation
     *
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
                $responseData['location']['coordinates'] = CoordinatesData::from($responseData['location']['coordinates']);
                $responseData['location'] = LocationData::from($responseData['location']);
            }

            $data = CepData::from($responseData);
        }

        return $data;
    }
}
