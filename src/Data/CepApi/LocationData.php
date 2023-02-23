<?php

namespace Corviz\BrasilAPI\Data\CepApi;

class LocationData extends \Corviz\BrasilAPI\Data\DataTransfer
{
    public function __construct(
        public readonly string $type,
        public readonly CoordinatesData $coordinates,
    ) {
    }
}
