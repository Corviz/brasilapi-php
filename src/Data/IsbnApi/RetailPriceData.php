<?php

namespace Corviz\BrasilAPI\Data\IsbnApi;

class RetailPriceData extends \Corviz\BrasilAPI\Data\DataTransfer
{
    public function __construct(
        public readonly string $currency,
        public readonly float $amount,
    ) {
    }
}