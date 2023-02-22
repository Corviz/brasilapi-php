<?php

namespace Corviz\BrasilAPI\Data\NcmApi;

use Corviz\BrasilAPI\Data\DataTransfer;
use DateTimeImmutable;

class NcmData extends DataTransfer
{
    /**
     * @param string $codigo
     * @param string $descricao
     * @param DateTimeImmutable $dataInicio
     * @param DateTimeImmutable|null $dataFim
     * @param string $tipoAto
     * @param string $numeroAto
     * @param string $anoAto
     */
    public function __construct(
        public readonly string $codigo,
        public readonly string $descricao,
        public readonly DateTimeImmutable $dataInicio,
        public readonly ?DateTimeImmutable $dataFim,
        public readonly string $tipoAto,
        public readonly string $numeroAto,
        public readonly string $anoAto,
    ) {
    }
}
