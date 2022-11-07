<?php

use App\Config\Configuration;
use App\Converter\ApiConverter;
use App\Converter\GamesConverter;
use App\Service\ApiService;
use Spatie\IcalendarGenerator\Components\Calendar;

require_once __DIR__ . '/../vendor/autoload.php';

$apiService = new ApiService();
$apiConverter = new ApiConverter();

$jsonObjects = $apiService->getJson(Configuration::getApiUrl());
$games = $apiConverter->convertToGamesModel($jsonObjects);

$gamesConverter = new GamesConverter();
$events = $gamesConverter->convertToEvents($games);

$calendar = Calendar::create('Athletic Sonnenberg - Spielplan 2022/2023')
    ->event($events);

file_put_contents('spielplan.ics', $calendar->get());

echo 'generated game plan successfully' . PHP_EOL;