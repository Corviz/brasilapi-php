<?php

namespace Corviz\BrasilAPI\Data\FipeApi;

use Corviz\BrasilAPI\Data\BaseData;

class RefTableData extends BaseData
{
    /**
     * @param int $codigo
     * @param string $mes
     */
    public function __construct(
        public readonly int $codigo,
        public readonly string $mes,
    ) {
    }
}