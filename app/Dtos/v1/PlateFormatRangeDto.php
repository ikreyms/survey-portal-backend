<?php

namespace App\Dtos\v1;

use App\Traits\HasTimestamps;
use Illuminate\Database\Eloquent\Collection;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class PlateFormatRangeDto extends Data
{
    use HasTimestamps;

    public function __construct(
        public ?int $id,
        public string $name,
        public int $start,
        public int $end,

        #[MapInputName('available_ranges')]
        /** @var DataCollection<int, PlateFormatRangeAvailableRangeDto> */
        public array $available,
    ) {}
}