<?php

namespace Corviz\BrasilAPI\Data\CnpjApi;

use Corviz\BrasilAPI\Data\BaseData;

class CnaeData extends BaseData
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