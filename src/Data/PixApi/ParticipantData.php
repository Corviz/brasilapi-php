<?php

namespace Corviz\BrasilAPI\Data\PixApi;

use Corviz\BrasilAPI\Data\DataTransfer;
use DateTimeImmutable;

class ParticipantData extends DataTransfer
{
    /**
     * @param string $ispb
     * @param string $nome
     * @param string $nomeReduzido
     * @param string $modalidadeParticipacao
     * @param string $tipoParticipacao
     * @param DateTimeImmutable $inicioOperacao
     */
    public function __construct(
        public readonly string $ispb,
        public readonly string $nome,
        public readonly string $nomeReduzido,
        public readonly string $modalidadeParticipacao,
        public readonly string $tipoParticipacao,
        public readonly DateTimeImmutable $inicioOperacao,
    ) {
    }
}
