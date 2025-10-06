<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
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
