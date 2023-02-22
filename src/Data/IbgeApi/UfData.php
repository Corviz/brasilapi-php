<?php

namespace Corviz\BrasilAPI\Data\IbgeApi;

use Corviz\BrasilAPI\Data\DataTransfer;

class UfData extends DataTransfer
{
    /**
     * @param int $id
     * @param string $sigla
     * @param string $nome
     * @param RegionData $regiao
     */
    public function __construct(
        public readonly int $id,
        public readonly string $sigla,
        public readonly string $nome,
        public readonly RegionData $regiao,
    ) {
    }
}
