<?php

namespace Corviz\BrasilAPI;

use Corviz\BrasilAPI\Data\TaxData;
use GuzzleHttp\Exception\GuzzleException;

class TaxApi extends ApiConsumer
{
    /**
     * @return array
     * @throws GuzzleException
     */
    public static function all(): array
    {
        $response = static::getClient()->get("taxas/v1");
        $data = [];

        if ($responseData = self::parseJson($response)) {
            foreach ($responseData as $tax) {
                $data[] = self::createTaxData($tax);
            }
        }

        return $data;
    }

    /**
     * @param string $name
     * @return array|TaxData
     * @throws GuzzleException
     */
    public static function getByName(string $name)
    {
        $response = static::getClient()->get("taxas/v1/$name");
        $data = [];

        if ($responseData = self::parseJson($response)) {
            $data = self::createTaxData($responseData);
        }

        return $data;
    }

    /**
     * @param array $apiData
     * @return TaxData
     */
    private static function createTaxData(array $apiData): TaxData
    {
        return new TaxData(
            name: $apiData['nome'],
            value: $apiData['valor']
        );
    }
}
