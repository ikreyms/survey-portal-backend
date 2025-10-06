<?php

namespace App\Services\v1;

use App\Models\Island;
use App\Repositories\v1\IslandRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IslandService
{
    public function __construct(
        private IslandRepository $islandRepository,
    ) {}

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

    public function viewOne(string $fCode)
    {
        $island = $this->islandRepository->getOneByFCode($fCode, with: ['atoll', 'category']);
        if (!$island) throw new NotFoundHttpException('Island not found');
        return $island;
    }
}
