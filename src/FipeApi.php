<?php

namespace Corviz\BrasilAPI;

use Corviz\BrasilAPI\Data\FipeApi\BrandData;
use Corviz\BrasilAPI\Data\FipeApi\PriceData;
use Corviz\BrasilAPI\Data\FipeApi\RefTableData;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class FipeApi extends ApiConsumer
{
    const TYPE_TRUCKS = 'caminhoes';
    const TYPE_CARS = 'carros';
    const TYPE_MOTORCYCLES = 'motos';

    /**
     * @return RefTableData[]
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function allRefTables(): array
    {
        $response = static::getClient()->get("fipe/tabelas/v1");
        $data = [];

        if ($responseData = self::parseJson($response)) {
            foreach ($responseData as $refTable) {
                $data[] = RefTableData::from($refTable);
            }
        }

        return $data;
    }

    /**
     * @param string $codigoFipe
     * @param int|null $tabelaReferencia
     * @return PriceData[]
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function pricesByCode(string $codigoFipe, ?int $tabelaReferencia = null): array
    {
        $uri = "fipe/preco/v1/$codigoFipe";
        if (!is_null($tabelaReferencia)) {
            $uri .= '?'.http_build_query([
                'tabela_referencia' => $tabelaReferencia,
            ]);
        }

        $response = static::getClient()->get($uri);
        $data = [];

        if ($responseData = self::parseJson($response)) {
            foreach ($responseData as $priceData) {
                $data[] = PriceData::from($priceData);
            }
        }

        return $data;
    }

    /**
     * @param string $type One of the values represented by TYPE_* constants
     * @param int|null $tabelaReferencia
     * @return BrandData[]
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function brandsByType(string $type, ?int $tabelaReferencia = null): array
    {
        $uri = "fipe/marcas/v1/$type";
        if (!is_null($tabelaReferencia)) {
            $uri .= '?'.http_build_query([
                    'tabela_referencia' => $tabelaReferencia,
                ]);
        }

        $response = static::getClient()->get($uri);
        $data = [];

        if ($responseData = self::parseJson($response)) {
            foreach ($responseData as $brand) {
                $data[] = BrandData::from($brand);
            }
        }

        return $data;
    }
}
