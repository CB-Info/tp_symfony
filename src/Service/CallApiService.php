<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getFilmCatData(): array
    {
        return $this->getApi('list');
    }

    public function getPopuData(): array
    {
        return $this->getApi('popular');
    }

    private function getApi(string $var, string $apiKey = "3d74eee8177839b59704eba881fb85d2")
    {
        $response = $this->client->request(
            'GET',
            'https://api.themoviedb.org/3/genre/movie/'. $var. '?api_key='. $apiKey. 'language=fr-FR'
        );

        return $response->toArray();
    }
}
