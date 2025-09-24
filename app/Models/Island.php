<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
    public function atoll()
    {
        return $this->belongsTo(Atoll::class);
    }

    public function category()
    {
        return $this->belongsTo(IslandCategory::class);
    }
}
