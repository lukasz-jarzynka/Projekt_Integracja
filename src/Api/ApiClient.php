<?php

namespace App\Api;

use GuzzleHttp\Client;

class ApiClient
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function fetchDataFromApi(string $url): string
    {
        $response = $this->client->get($url);
        $xml = $response->getBody()->getContents();

        return $xml;
    }

}