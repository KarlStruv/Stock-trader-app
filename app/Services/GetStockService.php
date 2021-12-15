<?php

namespace App\Services;

use App\Models\Stock;
use App\Repositories\ApiRepository;
use Symfony\Component\HttpFoundation\Request;

class GetStockService
{
    private ApiRepository $stocksRepository;

    public function __construct(ApiRepository $stocksRepository)
    {
        $this->stocksRepository = $stocksRepository;
    }

    public function searchStock(string $name)
    {
        return $this->stocksRepository->getDataByName($name);
    }

    public function getUserStock($user)
    {
        return $user->stock()->get()->all();
    }
}
