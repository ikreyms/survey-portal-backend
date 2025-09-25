<?php

namespace App\Http\Controllers\Api\v1;

use App\Dtos\v1\IslandDto;
use App\Http\Controllers\Controller;
use App\Models\Island;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class IslandController extends Controller
{
   public function index(Request $request)
    {
        $perPage = $request->integer('rowsPerPage', 10);
        $page = $request->integer('page', 1);

        $islands = QueryBuilder::for(Island::class)
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

        return response()->json(IslandDto::collect($islands));
    }

    public function show(string $fCode)
    {
        $island = Island::with(['atoll', 'category'])->where('f_code', $fCode)->first();
        if (!$island)
            throw new NotFoundHttpException();
        return IslandDto::from($island);
    }

}
