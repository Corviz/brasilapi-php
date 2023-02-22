<?php

namespace Corviz\BrasilAPI\Data\FipeApi;

use Corviz\BrasilAPI\Data\BaseData;

class BrandData extends BaseData
{
    /**
     * @param string $nome
     * @param int $valor
     */
    public function __construct(
        public readonly string $nome,
        public readonly int $valor,
    ) {
    }
}