<?php

namespace App\Http\Controllers;

use App\Dtos\v1\AppSettingDto;
use App\Models\AppSetting;
use Illuminate\Http\Request;

class AppSettingController extends Controller
{
    public function index()
    {
        return AppSettingDto::collect(AppSetting::all());
    }

    public function update(Request $request)
    {
        $settings = $request->all();

        $sql = "UPDATE app_settings SET value = CASE name ";
        $names = [];

        foreach ($settings as $setting) {
            $name = $setting['name'];
            $value = json_encode($setting['value']);
            $sql .= "WHEN '{$name}' THEN '{$value}' ";
            $names[] = "'{$name}'";
        }

        $sql .= "END WHERE name IN (" . implode(',', $names) . ")";

        \DB::statement($sql);

        return response()->noContent();
    }
}
