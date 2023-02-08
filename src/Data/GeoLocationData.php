<?php

namespace Corviz\BrasilAPI\Data;

class GeoLocationData extends BaseData
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
