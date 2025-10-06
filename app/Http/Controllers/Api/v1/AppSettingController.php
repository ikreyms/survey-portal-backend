<?php

namespace App\Http\Controllers\Api\v1;

use App\Dtos\v1\AppSettingDto;
use App\Http\Requests\v1\UpdateAppSettingRequest;
use App\Http\Controllers\Controller;
use App\Services\v1\AppSettingService;

class AppSettingController extends Controller
{
    public function __construct(
        private AppSettingService $appSettingService,
    ) {}

    public function index()
    {
        return $this->appSettingService->viewOne();
    }

    public function update(UpdateAppSettingRequest $request)
    {
        $dto = AppSettingDto::from($request->validated());
        $success = $this->appSettingService->updateFirst($dto);
        if ($success) return response()->noContent();
        return response()->json(['message' => 'Update failed'], 500);
    }
}
