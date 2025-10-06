<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\v1\IslandService;
use Illuminate\Http\Request;

class IslandController extends Controller
{
    public function __construct(
        private IslandService $islandService,
    ) {}

    public function index(Request $request)
    {
        $perPage = $request->integer('rowsPerPage', 10);
        $page = $request->integer('page', 1);

        return $this->islandService->viewAllPaginated($perPage, $page);
    }

    public function show(string $fCode)
    {
        return $this->islandService->viewOne($fCode);
    }

}
