<?php

namespace Corviz\BrasilAPI\Data\IbgeApi;

class CityData extends \Corviz\BrasilAPI\Data\BaseData
{
    /**
     * @param string $nome
     * @param string $codigoIbge
     */
    public function __construct(
        public readonly string $nome,
        public readonly string $codigoIbge,
    ) {
    }
}