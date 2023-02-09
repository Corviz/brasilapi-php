<?php

namespace Corviz\BrasilAPI\Data;

class TaxData extends BaseData
{
    /**
     * @param string $name
     * @param float $value
     */
    public function __construct(
        public readonly string $name,
        public readonly float $value,
    ) {
    }
}