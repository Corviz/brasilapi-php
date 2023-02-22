<?php

namespace Corviz\BrasilAPI;

use Corviz\BrasilAPI\Data\IbgeApi\CityData;
use Corviz\BrasilAPI\Data\IbgeApi\RegionData;
use Corviz\BrasilAPI\Data\IbgeApi\UfData;
use Corviz\BrasilAPI\Traits\ConvertsSnakeKeysToCamel;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class IbgeApi extends ApiConsumer
{
    use ConvertsSnakeKeysToCamel;

    /**
     * @return UfData[]
     * @throws ReflectionException
     * @throws GuzzleException
     */
    public static function allUf(): array
    {
        $response = static::getClient()->get("ibge/uf/v1");
        $data = [];

        if ($responseData = self::parseJson($response)) {
            foreach ($responseData as $uf) {
                $data[] = self::prepareUfData($uf);
            }
        }

        return $data;
    }

    /**
     * @param string $code
     * @return UfData|null
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function getUf(string $code): ?UfData
    {
        $response = static::getClient()->get("ibge/uf/v1/$code");
        $data = null;

        if ($responseData = self::parseJson($response)) {
            $data = self::prepareUfData($responseData);
        }

        return $data;
    }

    /**
     * @param string $siglaUf
     * @return CityData[]
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function getCitiesByUf(string $siglaUf): array
    {
        $response = static::getClient()->get("ibge/municipios/v1/$siglaUf");
        $data = [];

        if ($responseData = self::parseJson($response)) {
            foreach ($responseData as $city) {
                $data[] = CityData::from(self::snakeToCamelKeys($city));
            }
        }

        return $data;
    }

    /**
     * @param array $data
     * @return UfData
     * @throws ReflectionException
     */
    private static function prepareUfData(array $data): UfData
    {
        $data['regiao'] = RegionData::from($data['regiao']);
        return UfData::from($data);
    }
}