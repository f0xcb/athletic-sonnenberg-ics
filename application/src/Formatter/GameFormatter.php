<?php

namespace App\Formatter;

use App\Entity\Game;

class GameFormatter
{

    public static function formatMatch(Game $game): string
    {
        return sprintf('%s vs %s', $game->getHomeTeam(), $game->getGuestTeam());
    }

}