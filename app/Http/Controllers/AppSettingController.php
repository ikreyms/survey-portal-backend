<?php

namespace App\Http\Controllers;

use App\Dtos\v1\AppSettingDto;
use App\Models\AppSetting;
use Illuminate\Http\Request;

class AppSettingController extends Controller
{
    public function index(Request $request)
    {
        return AppSettingDto::collect(AppSetting::all());
    }
}
