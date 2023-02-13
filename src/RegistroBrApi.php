<?php

namespace Corviz\BrasilAPI;

use Corviz\BrasilAPI\Data\RegistroBrApi\DomainData;
use DateTimeImmutable;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class RegistroBrApi extends ApiConsumer
{
    /**
     * @param string $domain
     * @return DomainData|null
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function getDomain(string $domain): ?DomainData
    {
        $domain = urlencode($domain);
        $response = static::getClient()->get("registrobr/v1/$domain");
        $data = null;

        if ($responseData = self::parseJson($response)) {
            $responseData['publicationStatus'] = $responseData['publication-status'];
            $responseData['expiresAt'] = $responseData['expires-at'] ?
                DateTimeImmutable::createFromFormat('Y-m-d\TH:i:sP', $responseData['expires-at']) : null;
            $responseData['statusCode'] = $responseData['status_code'];

            $data = DomainData::from($responseData);
        }

        return $data;
    }
}
