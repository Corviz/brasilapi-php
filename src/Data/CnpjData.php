<?php

namespace Corviz\BrasilAPI\Data;

use DateTimeImmutable;

class CnpjData extends BaseData
{
    /**
     * @param string $cnpj
     * @param string $razaoSocial
     * @param string $nomeFantasia
     * @param int $situacaoCadastral
     * @param string $descricaoSituacaoCadastral
     * @param DateTimeImmutable $dataSituacaoCadastral
     * @param int $motivoSituacaoCadastral
     * @param DateTimeImmutable $dataInicioAtividade
     * @param int $cnaeFiscal
     * @param string $cnaeFiscalDescricao
     * @param string $logradouro
     * @param string $numero
     * @param string $complemento
     * @param string $bairro
     * @param string $descricaoTipoDeLogradouro
     * @param int $cep
     * @param string $uf
     * @param int $codigoMunicipio
     * @param string $municipio
     * @param string $dddTelefone1
     * @param string|null $dddTelefone2
     * @param string|null $dddFax
     * @param int $qualificacaoDoResponsavel
     * @param int $capitalSocial
     * @param string $porte
     * @param int $codigoPorte
     * @param string $descricaoPorte
     * @param bool $opcaoPeloSimples
     * @param DateTimeImmutable|null $dataOpcaoPeloSimples
     * @param DateTimeImmutable|null $dataExclusaoDoSimples
     * @param bool $opcaoPeloMei
     * @param string|null $situacaoEspecial
     * @param string|null $descricaoMotivoSituacaoCadastral
     * @param string|null $descricaoIdentificadorMatrizFilial
     * @param DateTimeImmutable|null $dataSituacaoEspecial
     * @param CnaeData[] $cnaesSecundarios
     * @param QsaData[] $qsa
     * @param string|null $pais
     * @param int|null $codigoPais
     * @param string|null $email
     * @param int|null $codigoNaturezaJuridica
     * @param string|null $naturezaJuridica
     * @param DateTimeImmutable|null $dataOpcaoPeloMei
     * @param DateTimeImmutable|null $dataExclusaoDoMei
     * @param int|null $codigoMunicipioIbge
     * @param string|null $nomeCidadeNoExterior
     * @param string|null $enteFederativoResponsavel
     * @param int|null $identificadorMatrizFilial
     */
    public function __construct(
        public readonly string $cnpj,
        public readonly string $razaoSocial,
        public readonly string $nomeFantasia,
        public readonly int $situacaoCadastral,
        public readonly string $descricaoSituacaoCadastral,
        public readonly DateTimeImmutable $dataSituacaoCadastral,
        public readonly int $motivoSituacaoCadastral,
        public readonly DateTimeImmutable $dataInicioAtividade,
        public readonly int $cnaeFiscal,
        public readonly string $cnaeFiscalDescricao,
        public readonly string $logradouro,
        public readonly string $numero,
        public readonly string $complemento,
        public readonly string $bairro,
        public readonly string $descricaoTipoDeLogradouro,
        public readonly int $cep,
        public readonly string $uf,
        public readonly int $codigoMunicipio,
        public readonly string $municipio,
        public readonly string $dddTelefone1,
        public readonly ?string $dddTelefone2,
        public readonly ?string $dddFax,
        public readonly int $qualificacaoDoResponsavel,
        public readonly int $capitalSocial,
        public readonly string $porte,
        public readonly int $codigoPorte,
        public readonly string $descricaoPorte,
        public readonly bool $opcaoPeloSimples,
        public readonly ?DateTimeImmutable $dataOpcaoPeloSimples,
        public readonly ?DateTimeImmutable $dataExclusaoDoSimples,
        public readonly bool $opcaoPeloMei,
        public readonly ?string $situacaoEspecial,
        public readonly ?string $descricaoMotivoSituacaoCadastral,
        public readonly ?string $descricaoIdentificadorMatrizFilial,
        public readonly ?DateTimeImmutable $dataSituacaoEspecial,
        public readonly array $cnaesSecundarios,
        public readonly array $qsa,
        public readonly ?string $pais,
        public readonly ?int $codigoPais,
        public readonly ?string $email,
        public readonly ?int $codigoNaturezaJuridica,
        public readonly ?string $naturezaJuridica,
        public readonly ?DateTimeImmutable $dataOpcaoPeloMei,
        public readonly ?DateTimeImmutable $dataExclusaoDoMei,
        public readonly ?int $codigoMunicipioIbge,
        public readonly ?string $nomeCidadeNoExterior,
        public readonly ?string $enteFederativoResponsavel,
        public readonly ?int $identificadorMatrizFilial,
    ) {
    }
}
