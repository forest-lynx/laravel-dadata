<?php

namespace ForestLynx\DaData\Services;

use ForestLynx\DaData\Traits\HttpClient;

class CleanerDaData
{
    use HttpClient;

    protected $api  = 'https://cleaner.dadata.ru/api';
    protected $content_type = 'application/json';

    /**
     * CleanerDaData constructor.
     *
     * @param string $token
     * @param string $secret
     * @param int $timeout
     * @param string $v
     */
    public function __construct(
        protected string $token,
        protected string $secret,
        protected ?int $timeout = 10,
        protected ?string $v = 'v1'
    ) {
    }

    /**
     * @param string $method
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public function post(string $method, array $data = []): array
    {
        $headers = [
            'Content-Type' => $this->content_type,
            'Authorization' => sprintf('Token %s', $this->token),
            'X-Secret' => $this->secret,
        ];
        $url    = sprintf('%s/%s/%s', $this->api, $this->v, $method);

        return $this->postData($headers, $url, $data, $this->timeout);
    }
}
