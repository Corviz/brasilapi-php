<?php

namespace Corviz\BrasilAPI\Data;

class TaxData extends BaseData
{
    /**
     * @param string $nome
     * @param float $valor
     */
    public function __construct(
        public readonly string $nome,
        public readonly float $valor,
    ) {
    }
}