<?php

namespace Corviz\BrasilAPI\Data\CptecApi;

use Corviz\BrasilAPI\Data\BaseData;

class CityData extends BaseData
{
    /**
     * @param string $nome
     * @param string $estado
     * @param int $id
     */
    public function __construct(
        public readonly string $nome,
        public readonly string $estado,
        public readonly int $id,
    ) {
    }
}
