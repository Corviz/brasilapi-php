<?php

namespace Corviz\BrasilAPI\Data;

class DddData extends BaseData
{
    /**
     * @param string $state
     * @param string[] $cities
     */
    public function __construct(
        public readonly string $state,
        public readonly array $cities,
    ) {
    }
}