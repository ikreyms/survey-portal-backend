<?php

namespace App\Services\v1;

use App\Dtos\v1\IslandCategoryDto;
use App\Repositories\v1\IslandCategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class IslandCategoryService
{
    public function __construct(
        private IslandCategoryRepository $islandCategoryRepository,
    ) {}

    public function viewAll(): Collection
    {
        return IslandCategoryDto::collect($this->islandCategoryRepository->getAll());
    }
}