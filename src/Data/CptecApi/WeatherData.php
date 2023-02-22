<?php

namespace Corviz\BrasilAPI\Data\CptecApi;

use Corviz\BrasilAPI\Data\DataTransfer;
use DateTimeImmutable;

class WeatherData extends DataTransfer
{
    /**
     * @param string $codigoIcao
     * @param DateTimeImmutable $atualizadoEm
     * @param int $pressaoAtmosferica Valor em hPa (Hectopascal)
     * @param string $visibilidade Metros
     * @param int $vento Velocidade em Km/h
     * @param int $direcaoVento Direção em graus (0 a 360)
     * @param int $umidade Umidade em porcentagem
     * @param float $temp Temperatura em graus Celsius
     * @param string|null $condicao
     * @param string|null $condicaoDesc
     */
    public function __construct(
        public readonly string $codigoIcao,
        public readonly DateTimeImmutable $atualizadoEm,
        public readonly int $pressaoAtmosferica,
        public readonly int $vento,
        public readonly int $direcaoVento,
        public readonly int $umidade,
        public readonly float $temp,
        public readonly ?string $visibilidade = null,
        public readonly ?string $condicao = null,
        public readonly ?string $condicaoDesc = null,
    ) {
    }
}
