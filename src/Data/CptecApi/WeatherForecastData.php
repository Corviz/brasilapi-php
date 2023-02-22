<?php

namespace Corviz\BrasilAPI\Data\CptecApi;

use Corviz\BrasilAPI\Data\BaseData;
use DateTimeImmutable;

class WeatherForecastData extends BaseData
{
    /**
     * @param string $cidade
     * @param string $estado
     * @param DateTimeImmutable $atualizadoEm
     * @param WeatherForecastDayData[] $clima
     */
    public function __construct(
        public readonly string $cidade,
        public readonly string $estado,
        public readonly DateTimeImmutable $atualizadoEm,
        public readonly array $clima,
    ) {
    }
}
