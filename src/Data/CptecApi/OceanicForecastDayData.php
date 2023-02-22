<?php

namespace Corviz\BrasilAPI\Data\CptecApi;

use Corviz\BrasilAPI\Data\DataTransfer;
use DateTimeImmutable;

class OceanicForecastDayData extends DataTransfer
{
    /**
     * @param DateTimeImmutable $data
     * @param OceanicForecastWaveData[] $dadosOndas
     */
    public function __construct(
        public readonly DateTimeImmutable $data,
        public readonly array $dadosOndas,
    ) {
    }
}
