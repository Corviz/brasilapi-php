<?php

namespace Corviz\BrasilAPI\Data\DddApi;

use Corviz\BrasilAPI\Data\BaseData;

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