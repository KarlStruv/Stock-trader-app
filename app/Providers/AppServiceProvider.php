<?php

namespace App\Providers;

use App\Repositories\FinnhubApiRepository;
use Finnhub\Api\DefaultApi;
use Finnhub\Configuration;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(FinnhubApiRepository::class, function (){
            $config = Configuration::getDefaultConfiguration()
                ->setApiKey('token', env('FINNHUB_API_KEY'));
            $client = new DefaultApi(
                new Client(),
                $config
            );
            return new FinnhubApiRepository($client);
        });
    }

    public function boot()
    {
        //
    }
}
