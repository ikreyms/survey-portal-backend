<?php

namespace App\Http\Controllers\Api\v1;

use App\Dtos\v1\IslandCategoryDto;
use App\Models\IslandCategory;
use App\Http\Controllers\Controller;

class IslandCategoryController extends Controller
{
    public function index()
    {
        return IslandCategoryDto::collect(IslandCategory::all());
    }

}
