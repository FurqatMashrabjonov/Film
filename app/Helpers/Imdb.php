<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Imdb
{
    private string $url = 'https://imdb-api.com/en/API';
    private string $apiKey = '';

    public function __construct()
    {
        $this->apiKey = config('services.imdb.key');
    }

    public function getMoviesByTitle($title)
    {
        return $this->get('Search', $title);
    }

    public function getRatingsById($imdbId)
    {
        return $this->get("Ratings", $imdbId);
    }
    public function get($route, $param)
    {
        $response = Http::async()->get($this->url . '/' . $route . '/' . $this->apiKey . '/' . $param)
            ->wait();
        return $response->json();
    }
}
