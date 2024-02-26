<?php

namespace ForestLynx\DaData\Services;

use ForestLynx\DaData\Traits\HttpClient;

class SuggestDaData
{
    use HttpClient;

    protected $api  = 'https://suggestions.dadata.ru/suggestions/api';
    protected $content_type = 'application/json';
    protected $accept       = 'application/json';

    /**
     * SuggestDaData constructor.
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
        protected ?string $v = '4_1'
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
            'Accept'        => $this->accept,
            'Authorization' => sprintf('Token %s', $this->token),
            'X-Secret'      => $this->secret,
        ];
        $url     = sprintf('%s/%s/%s', $this->api, $this->v, $method);

        return $this->postData($headers, $url, $data, $this->timeout);
    }

    /**
     * @param string $method
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public function get(string $method, array $data = []): array
    {
        $headers = [
            'Accept'        => $this->accept,
            'Authorization' => sprintf('Token %s', $this->token),
        ];
        $url     = sprintf('%s/%s/%s', $this->api, $this->v, $method);

        return $this->getData($headers, $url, $data, $this->timeout);
    }
}
