<?php

namespace Corviz\BrasilAPI\Data\CepApi;

use Corviz\BrasilAPI\Data\DataTransfer;

class CepData extends DataTransfer
{
    /**
     * @param string $cep
     * @param string $state
     * @param string $city
     * @param string $neighborhood
     * @param string $street
     * @param string $service
     * @param ?GeoLocationData $location
     */
    public function __construct(
        public readonly string $cep,
        public readonly string $state,
        public readonly string $city,
        public readonly string $neighborhood,
        public readonly string $street,
        public readonly string $service,
        public readonly ?GeoLocationData $location = null,
    ) {
    }
}
