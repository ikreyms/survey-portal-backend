<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlateFormat extends Model
{
    protected $fillable = ['name', 'prefix'];

    public function ranges()
    {
        return $this->hasMany(PlateFormatRange::class);
    }

    public function plates()
    {
        return $this->hasMany(Plate::class);
    }
}
