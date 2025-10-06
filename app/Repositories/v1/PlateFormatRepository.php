<?php

namespace App\Repositories\v1;

use App\Models\PlateFormat;
use Illuminate\Database\Eloquent\Collection;

class PlateFormatRepository
{
    public function getAll(): Collection
    {
        return PlateFormat::all();
    }
}
