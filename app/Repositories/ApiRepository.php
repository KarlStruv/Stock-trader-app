<?php

namespace App\Repositories;

interface ApiRepository
{
    public function getDataByName(string $companyName);
}
