<?php

namespace App\Service;

class ApiService
{

    public function getJson(string $url): object
    {
        return json_decode(file_get_contents($url));
    }

}