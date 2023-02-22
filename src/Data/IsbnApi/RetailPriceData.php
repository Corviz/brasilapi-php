<?php

namespace Corviz\BrasilAPI\Data\IsbnApi;

class RetailPriceData extends \Corviz\BrasilAPI\Data\BaseData
{
    public function __construct(
        public readonly string $currency,
        public readonly float $amount,
    ) {
    }
}