<?php

namespace Corviz\BrasilAPI;

use Corviz\BrasilAPI\Data\HolidayApi\HolidayData;
use DateTimeImmutable;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class HolidayApi extends ApiConsumer
{
    /**
     * @param int|null $year (null for current year)
     *
     * @return HolidayData[]
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function getByYear(?int $year = null): array
    {
        if (is_null($year)) {
            $year = date('Y');
        }

        $response = static::getClient()->get("feriados/v1/$year");
        $data = [];

        if ($responseData = self::parseJson($response)) {
            foreach ($responseData as $holiday) {
                $holiday['date'] = DateTimeImmutable::createFromFormat('Y-m-d P', $holiday['date'].' -03:00');
                $data[] = HolidayData::from($holiday);
            }
        }

        return $data;
    }
}