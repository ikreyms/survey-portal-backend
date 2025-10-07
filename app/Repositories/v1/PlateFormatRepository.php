<?php

namespace App\Repositories\v1;

use App\Dtos\v1\PlateFormatDto;
use App\Models\PlateFormat;
use Illuminate\Database\Eloquent\Collection;

class PlateFormatRepository
{
    public function createOne(PlateFormatDto $dto): PlateFormat
    {
        return PlateFormat::create($dto->toArray());
    }

    public function getAll(string|array $with = []): Collection
    {
        return PlateFormat::with($with)->get();
    }
}
