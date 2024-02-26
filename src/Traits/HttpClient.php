<?php

namespace ForestLynx\DaData\Traits;

use ForestLynx\DaData\Exceptions\DaDataException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

trait HttpClient
{
    /**
     * @throws \Exception
     */
    public function postData(array $headers, string $url, array $data, int $timeout): array
    {
        $response   = Http::withHeaders($headers)->timeout($timeout)->post($url, $data);

        return $this->data($response);
    }

    /**
     * @throws \Exception
     */
    public function getData(array $headers, string $url, array $data, int $timeout): array
    {
        $response   = Http::withHeaders($headers)->timeout($timeout)->get($url, $data);

        return $this->data($response);
    }

    /**
     * @throws ForestLynx\DaData\Exceptions\DaDataException
     */
    protected function data(Response $response): array
    {
        if ($response->status() != 200) {
            throw DaDataException::create($response->status());
        }
        $data = json_decode($response->body(), true);

        return $data;
    }
}
