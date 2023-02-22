<?php

namespace Corviz\BrasilAPI\Data\IbgeApi;

use Corviz\BrasilAPI\Data\DataTransfer;

class RegionData extends DataTransfer
{
    /**
     * @param int $id
     * @param string $sigla
     * @param string $nome
     */
    public function __construct(
        public readonly int $id,
        public readonly string $sigla,
        public readonly string $nome,
    ) {
    }
}
