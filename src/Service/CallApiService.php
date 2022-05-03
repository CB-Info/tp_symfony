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

    public function getFilmPopuData(): array
    {
        return $this->getApi('movie/popular');
    }

    public function getFilmData($idFilm): array
    {
        return $this->getApi('movie/'. $idFilm);
    }

    public function getFilmCatData(): array
    {
        return $this->getApi('genre/movie/list');
    }

    public function getFilmByCat($idCat): array
    {
        return $this->getApi('discover/movie', $idCat);
    }

    private function getApi(string $var, string $catOption="")
    {
        $response = $this->client->request(
            'GET',
            'https://api.themoviedb.org/3/'. $var. '?api_key=3d74eee8177839b59704eba881fb85d2&language=fr-FR&page=1'. $catOption
        );

        return $response->toArray();
    }
    
}
