<?php

namespace App\Services\v1;

use App\Dtos\v1\IslandDto;
use App\Repositories\v1\IslandRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IslandService
{
    public function __construct(
        private IslandRepository $islandRepository,
    ) {}

    public function viewAllPaginated(int $perPage, int $page)
    {
        $islands = $this->islandRepository->getAllPaginated($perPage, $page);
        return IslandDto::collect($islands);
    }

    public function viewOne(string $fCode): IslandDto
    {
        $island = $this->islandRepository->getOneByFCode($fCode, with: ['atoll', 'category']);
        if (!$island) throw new NotFoundHttpException('Island not found');
        return IslandDto::from($island);
    }
}
