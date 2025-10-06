<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\v1\IslandCategoryService;

class IslandCategoryController extends Controller
{
    public function __construct(
        private IslandCategoryService $islandCategoryService,
    ) {}

    public function index()
    {
        return $this->islandCategoryService->viewAll();
    }

}
