<?php

namespace Corviz\BrasilAPI\Data\FipeApi;

use Corviz\BrasilAPI\Data\BaseData;

class PriceData extends BaseData
{
    public function __construct(
        public readonly string $valor,
        public readonly string $marca,
        public readonly string $modelo,
        public readonly int $anoModelo,
        public readonly string $combustivel,
        public readonly string $codigoFipe,
        public readonly string $mesReferencia,
        public readonly int $tipoVeiculo,
        public readonly string $siglaCombustivel,
        public readonly string $dataConsulta,
    ) {
    }
}