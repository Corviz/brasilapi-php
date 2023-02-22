<?php

namespace Corviz\BrasilAPI\Data\IsbnApi;

use Corviz\BrasilAPI\Data\DataTransfer;

class IsbnData extends DataTransfer
{
    /**
     * @param string $isbn
     * @param string $title
     * @param string|null $subtitle
     * @param array $authors
     * @param string|null $publisher
     * @param string|null $synopsis
     * @param DimensionData|null $dimensions
     * @param int|null $year
     * @param string|null $format
     * @param int $pageCount
     * @param array $subjects
     * @param string|null $location
     * @param RetailPriceData|null $retailPrice
     * @param string|null $coverUrl
     * @param string|null $provider
     */
    public function __construct(
        public readonly string $isbn,
        public readonly string $title,
        public readonly ?string $subtitle = null,
        public readonly array $authors = [],
        public readonly ?string $publisher = null,
        public readonly ?string $synopsis = null,
        public readonly ?DimensionData $dimensions = null,
        public readonly ?int $year = null,
        public readonly ?string $format = null,
        public readonly int $pageCount = 0,
        public readonly array $subjects = [],
        public readonly ?string $location = null,
        public readonly ?RetailPriceData $retailPrice = null,
        public readonly ?string $coverUrl = null,
        public readonly ?string $provider = null,
    ) {
    }
}
