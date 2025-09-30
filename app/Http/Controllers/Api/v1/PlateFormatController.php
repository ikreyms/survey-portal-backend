<?php

namespace App\Http\Controllers\Api\v1;

use App\Dtos\v1\PlateFormatDto;
use App\Http\Controllers\Controller;
use App\Models\PlateFormat;
use Illuminate\Http\Request;

class PlateFormatController extends Controller
{
    public function index(Request $request)
    {
        return PlateFormatDto::collect(PlateFormat::all());
    }
}
