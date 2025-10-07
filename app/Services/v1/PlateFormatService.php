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

    public function createOne(PlateFormatDto $dto): PlateFormatDto
    {
        $format = $this->plateFormatRepository->createOne($dto);
        return PlateFormatDto::from($format);
    }

    public function viewAll(): Collection
    {
        try {
            // return PlateFormatDto::collect($this->plateFormatRepository->getAll(with: ['definedRanges', 'availableRanges']));
            $plateFormats = $this->plateFormatRepository->getAll(with: ['ranges.availableRanges']);
            return PlateFormatDto::collect($plateFormats);
            // return $plateFormats;

        } catch (\Exception $e) {
            // Log the exception message
            \Log::error('Error fetching plate formats: ' . $e->getMessage());
            // Optionally, rethrow the exception or return an empty collection
            throw $e; // or return collect();
        }
    }
}