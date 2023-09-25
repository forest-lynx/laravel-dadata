<?php

namespace ForestLynx\DaData;

use ForestLynx\DaData\Services\CleanerDaData;
use ForestLynx\DaData\Services\SuggestDaData;
use Spatie\LaravelData\DataCollection;

abstract class DaDataService
{
    protected $token;
    protected $secret;
    protected $timeout;
    protected $cleanerApi;
    protected $suggestApi;

    public function __construct()
    {
        $this->token = config('dadata.token') ?? env('DADATA_TOKEN', null);
        $this->secret = config('dadata.key') ?? env('DADATA_KEY', null);
        $this->timeout = config('dadata.timeout') ?? $this->timeout = env('DADATA_TIMEOUT', 10);
    }

    abstract protected function collection(array $data): DataCollection;

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function getSecret(): ?string
    {
        return $this->secret;
    }

    public function getTimeout(): ?int
    {
        return $this->timeout;
    }

    public function cleanerApi(string $v = 'v1'): CleanerDaData
    {
        if (! $this->cleanerApi instanceof CleanerDaData) {
                $this->cleanerApi = new CleanerDaData($this->token, $this->secret, $this->timeout, $v);
        }

        return $this->cleanerApi;
    }

    public function suggestApi(string $v = '4_1'): SuggestDaData
    {
        if (! $this->suggestApi instanceof SuggestDaData) {
                $this->suggestApi = new SuggestDaData($this->token, $this->secret, $this->timeout, $v);
        }

        return $this->suggestApi;
    }
}
