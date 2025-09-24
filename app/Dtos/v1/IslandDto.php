<?php

namespace App\Dtos\v1;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapInputName;

class IslandDto extends Data
{
    public function __construct(
        public int $id,

        #[MapInputName('f_code')]
        public string $fCode,

        public ?string $name,

        public ?AtollDto $atoll,

        public ?IslandCategoryDto $category,

        #[MapInputName('created_at')]
        public string $createdAt,

        #[MapInputName('updated_at')]
        public string $updatedAt,
    ) {}
}

class AtollDto extends Data
{
    public function __construct(
        public int $id,

        public string $name,

        public string $abbreviation,

        #[MapInputName('created_at')]
        public string $createdAt,

        #[MapInputName('updated_at')]
        public string $updatedAt,
        ) {}
    }

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
