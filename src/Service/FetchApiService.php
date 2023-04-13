<?php

namespace App\Service;

use App\Command\FetchApi;

class FetchApiService
{

    public function __construct(private FetchApi $fetchApi) {

    }

    public function fetchApiMultipleTimes(int $times = 16, int $interval = 1): void
    {
        for ($i = 0; $i < $times; $i++) {
            $this->fetchApi->performFetch(); // Załóżmy, że 'fetchApi' to metoda kontrolera, która wykonuje żądane wywołanie
            sleep($interval);
        }
    }

}