<?php

namespace App\Models;

use App\Dtos\v1\AppSettingDto;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $fillable = [
        'office_name', 'app_name', 'active_plate_format_id', 'updated_at', 'created_at'
    ];
}
