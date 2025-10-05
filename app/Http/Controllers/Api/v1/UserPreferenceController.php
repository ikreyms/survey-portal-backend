<?php

namespace App\Http\Controllers\Api\v1;

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
}
