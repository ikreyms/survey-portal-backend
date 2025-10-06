<?php

namespace App\Http\Controllers\Api\v1;

use App\Dtos\v1\PlateFormatDto;
use App\Http\Controllers\Controller;
use App\Models\PlateFormat;
use App\Services\v1\PlateFormatService;
use Illuminate\Http\Request;

class PlateFormatController extends Controller
{
    public function __construct(
        private PlateFormatService $plateFormatService,
    ) {}
    
    public function index(Request $request)
    {
        return $this->plateFormatService->viewAll();
    }
}
