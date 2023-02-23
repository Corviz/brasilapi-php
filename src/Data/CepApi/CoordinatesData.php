<?php

namespace Corviz\BrasilAPI\Data\CepApi;

class CoordinatesData extends \Corviz\BrasilAPI\Data\DataTransfer
{
    /**
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(
        public readonly float $latitude,
        public readonly float $longitude,
    ) {
    }
}
