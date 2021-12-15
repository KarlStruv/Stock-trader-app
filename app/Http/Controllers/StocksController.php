<?php

namespace App\Http\Controllers;

use App\Repositories\FinnhubApiRepository;
use App\Services\GetStockService;
use App\Services\StockService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    private FinnhubApiRepository $stocksRepository;
    private ?array $company = null;

    private GetStockService $getStockService;
    private StockService $buyStockService;

    public function __construct(FinnhubApiRepository $stocksRepository)
    {
        $this->stocksRepository = $stocksRepository;

        $this->getStockService = new GetStockService($this->stocksRepository);
        $this->buyStockService = new StockService();
    }

    public function searchView(Request $request)
    {
        if ($request['company'] != null) {
            $this->company = $this->getStockService->searchStock($request['company']);
        }

        return view('search', ['company' => $this->company]);
    }

    public function purchase(Request $request): RedirectResponse
    {
        $this->buyStockService->buyStock(
            $request['symbol'],
            $request['name'],
            $request['currentPrice'],
            $request['amount']
        );

        return redirect(route('stocks.portfolio'));
    }

    public function sell(){

    }

    public function portfolioView()
    {
        $userStock = $this->getStockService->getUserStock(auth()->user());

        return view('portfolio', ['stock' => $userStock]);
    }
}
