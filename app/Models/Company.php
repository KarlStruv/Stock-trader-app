<?php

namespace App\Models;

use Finnhub\Model\CompanyProfile2;

class Company
{
    private string $country;
    private string $currency;
    private string $logo;
    private string $name;
    private string $webUrl;
    private string $ticker;
    private string $shareOutstanding;
    private string $exchange;

    public function __construct(CompanyProfile2 $company)
    {
        $this->country = $company->getCountry();
        $this->currency = $company->getCurrency();
        $this->logo = $company->getLogo();
        $this->name = $company->getName();
        $this->webUrl = $company->getWebUrl();
        $this->ticker = $company->getTicker();
        $this->shareOutstanding = $company->getShareOutstanding();
        $this->exchange = $company->getExchange();
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getLogo(): string
    {
        return $this->logo;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getWebUrl(): string
    {
        return $this->webUrl;
    }

    public function getTicker(): string
    {
        return $this->ticker;
    }

    public function getShareOutstanding(): string
    {
        return $this->shareOutstanding;
    }

    public function getExchange(): string
    {
        return $this->exchange;
    }
}
