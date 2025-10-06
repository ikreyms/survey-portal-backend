<?php

namespace App\Http\Controllers\Api\v1;

use App\Dtos\v1\IslandDto;
use App\Http\Controllers\Controller;
use App\Models\Island;
use App\Services\v1\IslandService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class IslandController extends Controller
{
    public function __construct(
        private IslandService $islandService,
    ) {}

    public function index(Request $request)
    {
        $perPage = $request->integer('rowsPerPage', 10);
        $page = $request->integer('page', 1);

        $islandsPaginated = $this->islandService->getAllPaginated($perPage, $page);
        return response()->json(IslandDto::collect($islandsPaginated));
    }

    public function show(string $fCode): IslandDto
    {
        $island = $this->islandService->viewOne($fCode);
        return IslandDto::from($island);
    }

}
