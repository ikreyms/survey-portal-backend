<?php

namespace App\Dtos\v1;

use App\Traits\HasTimestamps;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapInputName;

class IslandDto extends Data
{
    use HasTimestamps;

    public function __construct(
        public int $id,

        #[MapInputName('f_code')]
        public string $fCode,

        public ?string $name,

        public ?AtollDto $atoll,

        public ?IslandCategoryDto $category,
    ) {}
}
