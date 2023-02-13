<?php

namespace Corviz\BrasilAPI\Data;

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