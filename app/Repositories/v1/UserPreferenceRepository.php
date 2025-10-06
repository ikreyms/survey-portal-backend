<?php

namespace App\Repositories\v1;

use App\Dtos\v1\UserPreferenceDto;
use App\Models\UserPreference;

class UserPreferenceRepository
{
    public function getOneByUserId(int $userId): ?UserPreference
    {
        return UserPreference::where('user_id', $userId)->first();
    }

    public function updateOne(UserPreferenceDto $dto): bool
    {
        return UserPreference::first()->update([
            'plate_range_input_type' => $dto->rangeSelectionMethod
        ]);
    }
}