<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlateFormatRange extends Model
{
    public function plateFormat()
    {
        return $this->belongsTo(PlateFormat::class);
    }

    public function availableRanges()
    {
        return $this->hasMany(AvailableRange::class);
    }
}
