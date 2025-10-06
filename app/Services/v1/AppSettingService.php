<?php

namespace App\Services\v1;

use App\Dtos\v1\AppSettingDto;
use App\Models\AppSetting;
use App\Repositories\v1\AppSettingRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AppSettingService
{
    public function __construct(
        private AppSettingRepository $appSettingRepository,
    ) {}

    public function viewAll(): AppSettingDto
    {
        $firstAppSetting = $this->appSettingRepository->getFirst();
        if (!$firstAppSetting) throw new NotFoundHttpException('App settings not found');
        return AppSettingDto::from($firstAppSetting);
    }

    public function updateFirst(AppSettingDto $dto): bool
    {
        return $this->appSettingRepository->updateFirst($dto);
    }
}
