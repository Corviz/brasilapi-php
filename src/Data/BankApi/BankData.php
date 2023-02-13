<?php

namespace Corviz\BrasilAPI\Data\BankApi;

use Corviz\BrasilAPI\Data\BaseData;

class BankData extends BaseData
{
    /**
     * @param string $ispb
     * @param string $name
     * @param int|null $code
     * @param string $fullName
     */
    public function __construct(
        public readonly string $ispb,
        public readonly string $name,
        public readonly ?int $code,
        public readonly string $fullName,
    ) {
    }
}