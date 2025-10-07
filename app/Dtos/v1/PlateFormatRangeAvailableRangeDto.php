<?php

namespace App\Dtos\v1;

use App\Traits\HasTimestamps;
use Spatie\LaravelData\Data;

class PlateFormatRangeAvailableRangeDto extends Data
{
    use HasTimestamps;

    public function __construct(
        public ?int $id,
        public int $start,
        public int $end,
    ) {}
}