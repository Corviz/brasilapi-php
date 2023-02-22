<?php

namespace Corviz\BrasilAPI\Data\CptecApi;

use Corviz\BrasilAPI\Data\DataTransfer;
use DateTimeImmutable;

class WeatherForecastDayData extends DataTransfer
{
    /**
     * @param DateTimeImmutable $data
     * @param string $condicao
     * @param int $min Temperatura minima em graus Celsius
     * @param int $max Temperatura máxima em graus Celsius
     * @param int $indiceUv O IUV representa o valor máximo diário da radiação ultravioleta
     * @param string $condicaoDesc
     */
    public function __construct(
        public readonly DateTimeImmutable $data,
        public readonly string $condicao,
        public readonly int $min,
        public readonly int $max,
        public readonly int $indiceUv,
        public readonly string $condicaoDesc,
    ) {
    }
}