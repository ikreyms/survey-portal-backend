<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    protected $fillable = [
        'plate_range_input_type', 'updated_at', 'created_at', 'user_id'
    ];
}
