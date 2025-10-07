<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvailableRange extends Model
{
    public function plateFormat()
    {
        return $this->belongsTo(PlateFormatRange::class);
    }
}
