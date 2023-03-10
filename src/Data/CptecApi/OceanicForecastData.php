<?php

namespace Corviz\BrasilAPI\Data\CptecApi;

use Corviz\BrasilAPI\Data\DataTransfer;
use DateTimeImmutable;

class OceanicForecastData extends DataTransfer
{
    /**
     * @param string $cidade
     * @param string $estado
     * @param DateTimeImmutable $atualizadoEm
     * @param OceanicForecastDayData[] $ondas
     */
    public function __construct(
        public readonly string $cidade,
        public readonly string $estado,
        public readonly DateTimeImmutable $atualizadoEm,
        public readonly array $ondas,
    ) {
    }
}
