<?php

namespace Corviz\BrasilAPI\Data\CptecApi;

use Corviz\BrasilAPI\Data\DataTransfer;

class CityData extends DataTransfer
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
