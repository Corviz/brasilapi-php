<?php

namespace Corviz\BrasilAPI\Data;

use DateTimeImmutable;

class QsaData extends BaseData
{
    public function __construct(
        public readonly int $identificadorDeSocio,
        public readonly string $nomeSocio,
        public readonly string $cnpjCpfDoSocio,
        public readonly int $codigoQualificacaoSocio,
        public readonly DateTimeImmutable $dataEntradaSociedade,
        public readonly ?string $cpfRepresentanteLegal,
        public readonly ?string $nomeRepresentanteLegal,
        public readonly ?string $codigoQualificacaoRepresentanteLegal,
        public readonly ?string $pais,
        public readonly ?int $codigoPais,
        public readonly ?string $faixaEtaria,
        public readonly ?int $codigoFaixaEtaria,
        public readonly ?string $qualificacaoSocio,
        public readonly ?string $qualificacaoRepresentanteLegal,
//        public readonly ?int $percentualCapitalSocial,
    ) {
    }
}