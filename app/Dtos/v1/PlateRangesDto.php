<?php

namespace App\Dtos\v1;

use Spatie\LaravelData\Data;

class PlateRangesDto extends Data
{
    public function __construct(
        public PlateFormatRangeDto $defined,

        public AvailableRangeDto $available,
    ) {}
}

class PlateFormatRangeDto extends Data
{
    public function __construct(
        public ?int $id,

        public string $name,

        public int $start,

        public int $end,
    ) {}
}

class AvailableRangeDto extends Data
{
    public function __construct(
        public ?int $id,

        public int $start,

        public int $end,
    ) {}
}