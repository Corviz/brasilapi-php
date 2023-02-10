<?php

namespace Corviz\BrasilAPI;

use Corviz\BrasilAPI\Data\TaxData;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class TaxApi extends ApiConsumer
{
    /**
     * @return TaxData[]
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function all(): array
    {
        $response = static::getClient()->get("taxas/v1");
        $data = [];

        if ($responseData = self::parseJson($response)) {
            foreach ($responseData as $tax) {
                $data[] = TaxData::from($tax);
            }
        }

        return $data;
    }

    /**
     * @param string $nome
     * @return TaxData|null
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function getByNome(string $nome): ?TaxData
    {
        $response = static::getClient()->get("taxas/v1/$nome");
        $data = null;

        if ($responseData = self::parseJson($response)) {
            $data = TaxData::from($responseData);
        }

        return $data;
    }
}
