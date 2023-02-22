<?php

namespace Corviz\BrasilAPI\Data\FipeApi;

use Corviz\BrasilAPI\Data\DataTransfer;

class RefTableData extends DataTransfer
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