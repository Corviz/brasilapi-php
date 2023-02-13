<?php

namespace Corviz\BrasilAPI;

use Corviz\BrasilAPI\Data\BankApi\BankData;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class BankApi extends ApiConsumer
{
    /**
     * @return BankData[]
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function all(): array
    {
        $response = static::getClient()->get("banks/v1");
        $data = [];

        if ($responseData = self::parseJson($response)) {
            foreach ($responseData as $bank) {
                $data[] = BankData::from($bank);
            }
        }

        return $data;
    }

    /**
     * @param int $code
     * @return BankData|null
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function get(int $code): ?BankData
    {
        $response = static::getClient()->get("banks/v1/$code");
        $data = null;

        if ($responseData = self::parseJson($response)) {
            $data = BankData::from($responseData);
        }

        return $data;
    }
}