<?php

namespace App\Converter;

use App\Entity\Game;
use App\Formatter\GameFormatter;
use DateInterval;
use Spatie\IcalendarGenerator\Components\Event;

class GamesConverter
{

    /**
     * @param Game[] $games
     * @return Event[]
     */
    public function convertToEvents(array $games): array
    {
        $listOfEvents = [];

        foreach ($games as $game) {
            if ($game->isEnded()) {
                continue;
            }

            $endDateTime = $game->getDateTime()->add(new DateInterval('PT180M'));

            $listOfEvents[] = Event::create()
                ->name(GameFormatter::formatMatch($game))
                ->startsAt($game->getDateTime())
                ->endsAt($endDateTime)
                ->alertMinutesBefore(60, GameFormatter::formatMatch($game));
        }

        return $listOfEvents;
    }

}