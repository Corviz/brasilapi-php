<?php

namespace Corviz\BrasilAPI\Data\DddApi;

use Corviz\BrasilAPI\Data\DataTransfer;

class DddData extends DataTransfer
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