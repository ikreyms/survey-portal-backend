<?php

namespace App\Repositories\v1;

use App\Dtos\v1\AppSettingDto;
use App\Models\AppSetting;

class AppSettingRepository
{
    public function getFirst(): ?AppSetting
    {
        return AppSetting::first();
    }

    public function updateFirst(AppSettingDto $dto)
    {
        return AppSetting::first()->update([
            'offic_name' => $dto->officeName,
            'app_name' => $dto->appName,
            'active_plate_format_id' => $dto->activePlateFormatId,
            'updated_at' => now(),
        ]);
    }
}