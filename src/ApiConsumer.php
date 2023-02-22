<?php

namespace Corviz\BrasilAPI;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

abstract class ApiConsumer
{
    /**
     * @var ?Client
     */
    private static ?Client $client = null;

    /**
     * @return Client
     */
    protected static function getClient(): Client
    {
        if (!self::$client) {
            $options = [
                'base_uri' => 'https://brasilapi.com.br/api/',
                'timeout' => $_ENV['BRASILAPI_TIMEOUT'] ?? 0,
                'allow_redirects' => true,
            ];

            if ($proxy = ($_ENV['BRASILAPI_PROXY'] ?? null)) {
                $options['proxy'] = $proxy;
            }
            self::$client = new Client($options);
        }

        return self::$client;
    }

    /**
     * @param ResponseInterface $response
     * @return array|null
     */
    protected static function parseJson(ResponseInterface $response): ?array
    {
        $data = null;
        $status = $response->getStatusCode();

        if ($status >= 200 && $status < 300) {
            $data = json_decode($response->getBody()->getContents(), true);
        }

        return $data;
    }
}