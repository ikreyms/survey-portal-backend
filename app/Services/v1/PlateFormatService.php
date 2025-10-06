<?php

namespace App\Services\v1;

use App\Dtos\v1\PlateFormatDto;
use App\Repositories\v1\PlateFormatRepository;
use Illuminate\Database\Eloquent\Collection;

class PlateFormatService
{
    public function __construct(
        private PlateFormatRepository $plateFormatRepository,
    ) {}

    public function viewAll(): Collection
    {
        return PlateFormatDto::collect($this->plateFormatRepository->getAll());
    }
}