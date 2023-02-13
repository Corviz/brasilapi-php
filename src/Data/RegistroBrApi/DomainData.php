<?php

namespace Corviz\BrasilAPI\Data\RegistroBrApi;

use DateTimeImmutable;
use \Corviz\BrasilAPI\Data\BaseData;

class DomainData extends BaseData
{
    /**
     * @param int $statusCode
     * @param string $status
     * @param string $fqdn
     * @param string $fqdnace
     * @param bool $exempt
     * @param string[] $suggestions
     * @param string[] $hosts
     * @param string|null $publicationStatus
     * @param DateTimeImmutable|null $expiresAt
     * @param array $reasons
     */
    public function __construct(
        public readonly ?int $statusCode,
        public readonly string $status,
        public readonly string $fqdn,
        public readonly string $fqdnace,
        public readonly bool $exempt,
        public readonly array $suggestions,
        public readonly array $hosts,
        public readonly ?string $publicationStatus,
        public readonly ?DateTimeImmutable $expiresAt,
        public readonly array $reasons = [],
    ) {
    }
}
