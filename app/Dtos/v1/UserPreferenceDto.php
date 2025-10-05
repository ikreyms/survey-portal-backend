<?php

namespace App\Dtos\v1;

use App\Traits\HasTimestamps;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class UserPreferenceDto extends Data
{
    use HasTimestamps;

    public function __construct(
        #[MapInputName('plate_range_input_type')]
        public ?string $rangeSelectionMethod,
    ) {}
}
