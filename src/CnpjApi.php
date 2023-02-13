<?php

namespace Corviz\BrasilAPI;

use Corviz\BrasilAPI\Data\CnpjApi\CnaeData;
use Corviz\BrasilAPI\Data\CnpjApi\CnpjData;
use Corviz\BrasilAPI\Data\CnpjApi\QsaData;
use Corviz\BrasilAPI\Traits\ConvertsSnakeKeysToCamel;
use DateTimeImmutable;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class CnpjApi extends ApiConsumer
{
    use ConvertsSnakeKeysToCamel;

    private const DATE_FIELDS = [
        'dataSituacaoCadastral',
        'dataInicioAtividade',
        'dataOpcaoPeloSimples',
        'dataExclusaoDoSimples',
        'dataSituacaoEspecial',
        'dataOpcaoPeloMei',
        'dataExclusaoDoMei',
    ];

    /**
     * @param string $cnpj
     * @return CnpjData|null
     * @throws GuzzleException
     * @throws ReflectionException
     */
    public static function get(string $cnpj): ?CnpjData
    {
        $response = static::getClient()->get("cnpj/v1/$cnpj");
        $data = null;

        if ($responseData = self::parseJson($response)) {
            $responseData = self::snakeToCamelKeys($responseData);

            if (!empty($responseData['cnaesSecundarios'])) {
                foreach ($responseData['cnaesSecundarios'] as &$item) {
                    $item = CnaeData::from($item);
                }
            }

            if (!empty($responseData['qsa'])) {
                foreach ($responseData['qsa'] as &$item) {
                    !empty($item['dataEntradaSociedade'])
                    && $item['dataEntradaSociedade'] = DateTimeImmutable::createFromFormat(
                        "Y-m-d P", $item['dataEntradaSociedade'].' -03:00'
                    );

                    $item = QsaData::from($item);
                }
            }

            foreach (self::DATE_FIELDS as $field) {
                !empty($responseData[$field])
                && $responseData[$field] = DateTimeImmutable::createFromFormat(
                    "Y-m-d P", $responseData[$field].' -03:00'
                );
            }

            $responseData['opcaoPeloSimples'] = (bool) $responseData['opcaoPeloSimples'];
            $responseData['opcaoPeloMei'] = (bool) $responseData['opcaoPeloMei'];

            $data = CnpjData::from($responseData);
        }

        return $data;
    }
}
