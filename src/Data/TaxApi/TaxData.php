<?php

namespace Corviz\BrasilAPI\Data\TaxApi;

use Corviz\BrasilAPI\Data\DataTransfer;

class TaxData extends DataTransfer
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