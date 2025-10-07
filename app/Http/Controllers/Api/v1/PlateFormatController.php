<?php

namespace App\Http\Controllers\Api\v1;

use App\Dtos\v1\PlateFormatDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\StorePlateFormatRequest;
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

    public function store(StorePlateFormatRequest $request)
    {
        $dto = PlateFormatDto::from($request->validated());
        $format = $this->plateFormatService->createOne($dto);
        return $format;
    }
}
