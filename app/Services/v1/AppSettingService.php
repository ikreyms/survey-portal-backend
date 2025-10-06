<?php

namespace App\Services\v1;

use App\Dtos\v1\AppSettingDto;
use App\Repositories\v1\AppSettingRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AppSettingService
{
    public function __construct(
        private AppSettingRepository $appSettingRepository,
    ) {}

    public function viewOne(): AppSettingDto
    {
        $appSetting = $this->appSettingRepository->getFirst();
        if (!$appSetting) throw new NotFoundHttpException('App settings not found');
        return AppSettingDto::from($appSetting);
    }

    public function updateFirst(AppSettingDto $dto): bool
    {
        return $this->appSettingRepository->updateFirst($dto);
    }
}
