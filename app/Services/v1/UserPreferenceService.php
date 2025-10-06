<?php

namespace App\Services\v1;

use App\Dtos\v1\UserPreferenceDto;
use App\Repositories\v1\UserPreferenceRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserPreferenceService
{
    public function __construct(
        private UserPreferenceRepository $userPreferenceRepository,
    ) {}

    public function viewOne(int $userId): UserPreferenceDto
    {
        $userPreference = $this->userPreferenceRepository->getOneByUserId($userId);
        if (!$userPreference) throw new NotFoundHttpException('User preferences not found');
        return UserPreferenceDto::from($userPreference);
    }

    public function updateOne(UserPreferenceDto $dto): bool
    {
        return $this->userPreferenceRepository->updateOne($dto);
    }
}