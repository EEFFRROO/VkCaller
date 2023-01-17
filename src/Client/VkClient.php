<?php


namespace App\Client;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class VkClient
{
    private const BASE_URL = 'https://api.vk.com/method/';
    private const VERSION = '5.131';

    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $vkClient)
    {
        $this->client = $vkClient;
    }

    public function sendGet(string $method, array $params = []): mixed
    {
        $params['v'] = self::VERSION;
        $queryParams = '?';
        foreach ($params as $key => $value) {
            if ($queryParams !== '?') {
                $queryParams .= '&';
            }
            $queryParams .= $key . '=' . $value;
        }
        $response = $this->client->request(
            Request::METHOD_GET,
            self::BASE_URL . $method . $queryParams
        );
        $content = $response->toArray();
        return $content['response'];
    }
}