<?php

namespace Corviz\BrasilAPI\Data\IsbnApi;

use Corviz\BrasilAPI\Data\DataTransfer;

class DimensionData extends DataTransfer
{
    /**
     * @param float $width
     * @param float $height
     * @param string $unit
     */
    public function __construct(
        public readonly float $width,
        public readonly float $height,
        public readonly string $unit,
    ) {
    }
}