<?php

namespace Corviz\BrasilAPI\Data\CepApi;

use Corviz\BrasilAPI\Data\DataTransfer;

class GeoLocationData extends DataTransfer
{
    /**
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(
        public readonly float $latitude,
        public readonly float $longitude
    ) {
    }
}
