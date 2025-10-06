<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use App\Services\v1\UserPreferenceService;
use Illuminate\Http\Request;
use App\Dtos\v1\UserPreferenceDto;
use App\Http\Controllers\Controller;

class UserPreferenceController extends Controller
{
    public function __construct(
        private UserPreferenceService $userPreferenceService,
    ) {}

    public function show(User $user)
    {
        return $this->userPreferenceService->viewOne($user->id);
    }

    public function update(Request $request, User $user)
    {
        $dto = UserPreferenceDto::from($request->all());
        $success = $this->userPreferenceService->updateOne($dto);
        if ($success) return response()->noContent();
        return response()->json(['message' => 'Update failed'], 500);
    }

}
