<?php

namespace Corviz\BrasilAPI\Data\IbgeApi;

use Corviz\BrasilAPI\Data\BaseData;

class RegionData extends BaseData
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
