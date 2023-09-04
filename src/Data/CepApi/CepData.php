<?php

namespace Corviz\BrasilAPI\Data\CepApi;

use Corviz\BrasilAPI\Data\DataTransfer;

class CepData extends DataTransfer
{
    /**
     * @param string $cep
     * @param string $state
     * @param string $city
     * @param string $service
     * @param ?string $street
     * @param ?string $neighborhood
     * @param ?LocationData $location
     */
    public function __construct(
        public readonly string $cep,
        public readonly string $state,
        public readonly string $city,
        public readonly string $service,
        public readonly ?string $street = null,
        public readonly ?string $neighborhood = null,
        public readonly ?LocationData $location = null,
    ) {
    }
}
