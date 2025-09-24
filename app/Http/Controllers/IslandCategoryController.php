<?php

namespace App\Http\Controllers;

use App\Dtos\v1\IslandCategoryDto;
use App\Models\IslandCategory;

class IslandCategoryController extends Controller
{
    public function index()
    {
        return IslandCategoryDto::collect(IslandCategory::all());
    }

}
