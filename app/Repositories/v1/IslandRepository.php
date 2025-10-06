<?php

namespace App\Repositories\v1;

use App\Models\Island;

class IslandRepository
{
    public function getOneByFCode(string $fCode, string|array $with = []): ?Island
    {
        return Island::with($with)->where('f_code', $fCode)->first();
    }
}
