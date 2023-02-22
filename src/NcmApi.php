<?php

namespace Corviz\BrasilAPI;

use Corviz\BrasilAPI\Data\NcmApi\NcmData;
use Corviz\BrasilAPI\Traits\ConvertsSnakeKeysToCamel;
use DateTimeImmutable;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class NcmApi extends ApiConsumer
{
    use ConvertsSnakeKeysToCamel;

    /**
     * @param string|null $search
     * @return array
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function all(?string $search = null): array
    {
        $uri = 'ncm/v1';

        if (!is_null($search)) {
            $uri .= '?'.http_build_query(compact('search'));
        }

        $response = static::getClient()->get($uri);
        $data = [];

        if ($responseData = self::parseJson($response)) {
            foreach ($responseData as $ncm) {
                $ncm = self::snakeToCamelKeys($ncm);
                self::convertDates($ncm);

                $data[] = NcmData::from($ncm);
            }
        }

        return $data;
    }

    /**
     * @param string $code
     * @return NcmData|null
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function get(string $code): ?NcmData
    {
        $response = static::getClient()->get("ncm/v1/$code");
        $data = null;

        if ($responseData = self::parseJson($response)) {
            $ncm = self::snakeToCamelKeys($responseData);
            self::convertDates($ncm);

            $data = NcmData::from($ncm);
        }

        return $data;
    }

    /**
     * @param array $ncm
     * @return void
     */
    private static function convertDates(array &$ncm): void
    {
        foreach (['dataInicio', 'dataFim'] as $field) {
            if (!$ncm[$field]) {
                continue;
            }

            $ncm[$field] = DateTimeImmutable::createFromFormat('Y-m-d H:i P', "$ncm[$field] 00:00 -03:00");
        }
    }
}
