<?php

namespace Corviz\BrasilAPI\Data\CptecApi;

use Corviz\BrasilAPI\Data\DataTransfer;
use DateTimeImmutable;

class OceanicForecastWaveData extends DataTransfer
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
