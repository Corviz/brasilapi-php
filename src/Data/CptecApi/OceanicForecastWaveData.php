<?php

namespace Corviz\BrasilAPI\Data\CptecApi;

use Corviz\BrasilAPI\Data\BaseData;
use DateTimeImmutable;

class OceanicForecastWaveData extends BaseData
{
    public function __construct(
        public readonly float $vento,
        public readonly string $direcaoVento,
        public readonly float $alturaOnda,
        public readonly string $direcaoOnda,
        public readonly string $agitation,
        public readonly string $hora,
        public readonly ?string $direcaoVentoDesc = null,
        public readonly ?string $direcaoOndaDesc = null,
    ) {
    }
}
