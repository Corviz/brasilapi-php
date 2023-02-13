<?php

namespace Corviz\BrasilAPI\Data\CnpjApi;

use Corviz\BrasilAPI\Data\BaseData;
use DateTimeImmutable;

class QsaData extends BaseData
{
    /**
     * @param int $identificadorDeSocio
     * @param string $nomeSocio
     * @param string $cnpjCpfDoSocio
     * @param int $codigoQualificacaoSocio
     * @param DateTimeImmutable $dataEntradaSociedade
     * @param string|null $cpfRepresentanteLegal
     * @param string|null $nomeRepresentanteLegal
     * @param string|null $codigoQualificacaoRepresentanteLegal
     * @param string|null $pais
     * @param int|null $codigoPais
     * @param string|null $faixaEtaria
     * @param int|null $codigoFaixaEtaria
     * @param string|null $qualificacaoSocio
     * @param string|null $qualificacaoRepresentanteLegal
     */
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
    ) {
    }
}