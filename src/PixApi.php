<?php

namespace Corviz\BrasilAPI;

use Corviz\BrasilAPI\Data\PixApi\ParticipantData;
use Corviz\BrasilAPI\Traits\ConvertsSnakeKeysToCamel;
use DateTimeImmutable;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class PixApi extends ApiConsumer
{
    use ConvertsSnakeKeysToCamel;

    /**
     * @return array
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function participants()
    {
        $response = static::getClient()->get("pix/v1/participants");
        $data = [];

        if ($responseData = self::parseJson($response)) {
            foreach ($responseData as $participant) {
                $participant = self::snakeToCamelKeys($participant);
                $participant['inicioOperacao'] = DateTimeImmutable::createFromFormat(
                    DateTimeImmutable::RFC3339_EXTENDED, $participant['inicioOperacao']
                );

                $data[] = ParticipantData::from($participant);
            }
        }

        return $data;
    }
}
