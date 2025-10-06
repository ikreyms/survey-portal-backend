<?php

namespace App\Repositories\v1;

use App\Models\Island;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class IslandRepository
{
    public function getOneByFCode(string $fCode, string|array $with = []): ?Island
    {
        return Island::with($with)->where('f_code', $fCode)->first();
    }

    public function getAllPaginated(int $perPage, int $page): LengthAwarePaginator
    {
        return QueryBuilder::for(Island::class)
            ->with(['atoll', 'category'])
            ->allowedFilters([
                AllowedFilter::callback('search', function ($query, $value) {
                    $query->where(function ($q) use ($value) {
                        $q->where('name', 'like', "%{$value}%")
                            ->orWhere('f_code', 'like', "%{$value}%");
                    });
                }),
                AllowedFilter::callback('categories', function ($query, $value) {
                    $categoriesArray = is_array($value)
                        ? $value
                        : array_map('trim', explode(',', $value));

                    $query->whereHas('category', function ($q) use ($categoriesArray) {
                        $q->whereIn('name', $categoriesArray);
                    });
                }),
            ])
            ->paginate($perPage, ['*'], 'page', $page);
    }
}
