<?php

namespace App\Dtos\v1;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class IslandCategoryDto extends Data
{
    public function __construct(
        public int $id,

        public string $name,

        #[MapInputName('created_at')]
        public string $createdAt,

        #[MapInputName('updated_at')]
        public string $updatedAt,
    ) {}
}
