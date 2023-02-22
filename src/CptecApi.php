<?php

namespace Corviz\BrasilAPI;

use Corviz\BrasilAPI\Data\CptecApi\CityData;
use Corviz\BrasilAPI\Data\CptecApi\OceanicForecastData;
use Corviz\BrasilAPI\Data\CptecApi\OceanicForecastDayData;
use Corviz\BrasilAPI\Data\CptecApi\OceanicForecastWaveData;
use Corviz\BrasilAPI\Data\CptecApi\WeatherData;
use Corviz\BrasilAPI\Data\CptecApi\WeatherForecastData;
use Corviz\BrasilAPI\Data\CptecApi\WeatherForecastDayData;
use Corviz\BrasilAPI\Traits\ConvertsSnakeKeysToCamel;
use DateTimeImmutable;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class CptecApi extends ApiConsumer
{
    use ConvertsSnakeKeysToCamel;

    /**
     * @param string|null $cityName
     * @return CityData[]
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function getCities(?string $cityName = null): array
    {
        $uri = "cptec/v1/cidade";
        if (!is_null($cityName)) {
            $uri .= "/$cityName";
        }

        $response = static::getClient()->get($uri);
        $data = [];

        if ($responseData = self::parseJson($response)) {
            foreach ($responseData as $city) {
                $data[] = CityData::from($city);
            }
        }

        return $data;
    }

    /**
     * @return WeatherData[]
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function getWeatherAtCapitalCities(): array
    {
        $response = static::getClient()->get('cptec/v1/clima/capital');
        $data = [];

        if ($responseData = self::parseJson($response)) {
            foreach ($responseData as $weather) {
                $data[] = self::prepareWeatherData($weather);
            }
        }

        return $data;
    }

    /**
     * @param string $icaoCode
     * @return WeatherData|null
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function getWeatherAtAirport(string $icaoCode): ?WeatherData
    {
        $response = static::getClient()->get("cptec/v1/clima/aeroporto/$icaoCode");
        $data = null;

        if ($responseData = self::parseJson($response)) {
            $data = self::prepareWeatherData($responseData);
        }

        return $data;
    }

    /**
     * @param int $cityCode
     * @param int $days 1-6 days
     * @return WeatherForecastData|null
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function getWeatherForecastForCity(int $cityCode, int $days = 1): ?WeatherForecastData
    {
        $response = static::getClient()->get("cptec/v1/clima/previsao/$cityCode/$days");
        $data = null;

        if ($responseData = self::parseJson($response)) {
            $data = self::prepareWeatherForecastData($responseData);
        }

        return $data;
    }

    /**
     * @param int $cityCode
     * @param int $days
     * @return OceanicForecastData|null
     * @throws GuzzleException
     */
    public static function getOceanicForecastForCity(int $cityCode, int $days = 1): ?OceanicForecastData
    {
        $response = static::getClient()->get("cptec/v1/ondas/$cityCode/$days");
        $data = null;

        if ($responseData = self::parseJson($response)) {
            $data = self::prepareOceanicForecastData($responseData);
        }

        return $data;
    }

    /**
     * @param array $weather
     * @return WeatherData
     * @throws ReflectionException
     */
    private static function prepareWeatherData(array $weather): WeatherData
    {
        $weather = self::snakeToCamelKeys($weather);
        $weather['atualizadoEm'] = DateTimeImmutable::createFromFormat(
            DateTimeImmutable::RFC3339_EXTENDED, $weather['atualizadoEm']
        );

        return WeatherData::from($weather);
    }

    /**
     * @param array $weather
     * @return WeatherForecastData
     * @throws ReflectionException
     */
    private static function prepareWeatherForecastData(array $weather): WeatherForecastData
    {
        $weather = self::snakeToCamelKeys($weather);
        $weather['atualizadoEm'] = DateTimeImmutable::createFromFormat(
            'Y-m-d H:i:s P', "{$weather['atualizadoEm']} 00:00:00 -03:00"
        );

        $clima = [];
        foreach ($weather['clima'] as $c) {
            $c['data'] = DateTimeImmutable::createFromFormat(
                'Y-m-d H:i:s P', "{$c['data']} 00:00:00 -03:00"
            );
            $clima[] = WeatherForecastDayData::from($c);
        }
        $weather['clima'] = $clima;

        return WeatherForecastData::from($weather);
    }

    private static function prepareOceanicForecastData(array $data): OceanicForecastData
    {
        $data = self::snakeToCamelKeys($data);
        $data['atualizadoEm'] = DateTimeImmutable::createFromFormat(
            'Y-m-d H:i:s P', "{$data['atualizadoEm']} 00:00:00 -03:00"
        );

        foreach ($data['ondas'] as &$onda) {
            $onda['data'] = DateTimeImmutable::createFromFormat(
                'Y-m-d H:i:s P', "{$onda['data']} 00:00:00 -03:00"
            );

            foreach ($onda['dadosOndas'] as &$dadosOnda) {
                try {
                    $dadosOnda = OceanicForecastWaveData::from($dadosOnda);
                } catch (\Exception $e) {
                    print_r($dadosOnda);
                }
            }

            $onda = OceanicForecastDayData::from($onda);
        }

        return OceanicForecastData::from($data);
    }
}
