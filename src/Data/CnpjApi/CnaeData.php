<?php

namespace Corviz\BrasilAPI\Data\CnpjApi;

use Corviz\BrasilAPI\Data\DataTransfer;

class CnaeData extends DataTransfer
{
    /**
     * @param int $codigo
     * @param string $descricao
     */
    public function __construct(
        public readonly int $codigo,
        public readonly string $descricao,
    ) {
    }
}