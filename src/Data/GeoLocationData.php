<?php

namespace Corviz\BrasilAPI\Data;

class GeoLocationData extends BaseData
{
    public function __construct(
        public readonly float $latitude,
        public readonly float $longitude
    ) {
    }
}
