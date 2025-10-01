<?php

namespace App\Dtos\v1;

use App\Traits\HasTimestamps;
use Spatie\LaravelData\Data;

class AtollDto extends Data
{
    use HasTimestamps;

    public function __construct(
        public int $id,

        public string $name,

        public string $abbreviation,
    ) {}
}
