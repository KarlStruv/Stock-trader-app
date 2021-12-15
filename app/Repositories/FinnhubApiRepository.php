<?php

namespace App\Repositories;

use Finnhub\Api\DefaultApi;
use Finnhub\ApiException;
use Finnhub\Configuration;
use GuzzleHttp\Client;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\SimpleCache\InvalidArgumentException;

class FinnhubApiRepository implements ApiRepository
{
    private DefaultApi $client;

    public function __construct(DefaultApi $client)
    {
        $this->client = $client;
    }

    /**
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     * @throws InvalidArgumentException
     * @throws ApiException
     */
    public function getDataByName(string $companyName)
    {
        $symbol = $this->client->symbolSearch($companyName)->getResult()[0]->getSymbol();
        $general = $this->client->companyProfile2($symbol);

        $prices = $this->client->quote($symbol);

        $data['symbol'] = $symbol;
        $data['name'] = $general->getName();
        $data['logo'] = $general->getLogo();
        $data['country'] = $general->getCountry();
        $data['currency'] = $general->getCurrency();
        $data['currentPrice'] = $prices->getC();
        $data['highPrice'] = $prices->getH();
        $data['lowPrice'] = $prices->getL();
        $data['openPrice'] = $prices->getO();

        return $data;
    }
}
