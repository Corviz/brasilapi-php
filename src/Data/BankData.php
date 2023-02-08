<?php

namespace Corviz\BrasilAPI\Data;

class BankData extends BaseData
{
    public function __construct(
        public readonly string $ispb,
        public readonly string $name,
        public readonly ?int $code,
        public readonly string $fullName,
    ) {
    }
}