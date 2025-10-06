<?php

namespace App\Repositories\v1;

use App\Models\IslandCategory;
use Illuminate\Database\Eloquent\Collection;

class IslandCategoryRepository
{
    public function getAll(): Collection
    {
        return IslandCategory::all();
    }
}
