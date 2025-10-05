<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Dtos\v1\UserPreferenceDto;
use App\Http\Controllers\Controller;
use App\Models\UserPreference;

class UserPreferenceController extends Controller
{
    public function index()
    {
        return UserPreferenceDto::from(UserPreference::first());
    }

    public function update(Request $request, User $user)
    {
        $dto = UserPreferenceDto::from($request->all());

        $userPreference = UserPreference::where('user_id', $user->id)->first();

        if (!$userPreference) return response()->json(['message: Not Found'], 404);

        $success = $userPreference->update([
            'plate_range_input_type' => $dto->rangeSelectionMethod
        ]);

        if ($success) return response()->noContent();
    }

}
