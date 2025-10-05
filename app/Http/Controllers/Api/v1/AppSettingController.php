<?php

namespace App\Http\Controllers\Api\v1;

use App\Dtos\v1\AppSettingDto;
use App\Http\Requests\v1\UpdateAppSettingRequest;
use App\Models\AppSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppSettingController extends Controller
{
    public function index()
    {
        return response()->json(AppSettingDto::from(AppSetting::first()));
    }

    public function update(UpdateAppSettingRequest $request)
    {
        $dto = AppSettingDto::from($request->validated());

        $success = AppSetting::find(1)->update([
            'office_name' => $dto->officeName,
            'app_name' => $dto->appName,
            'active_plate_format_id' => $dto->activePlateFormatId,
            'updated_at' => now(),
        ]);

        return $success;

        if ($success) {
            return response()->noContent();
        }
    }
}
