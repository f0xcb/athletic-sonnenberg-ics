<?php

namespace App\Converter;

use App\Entity\Game;

class ApiConverter
{

    /** @return Game[] */
    public function convertToGamesModel(object $objectGames): array
    {
        $listOfGames = [];

        foreach ($objectGames as $gameObject) {
            $listOfGames[] = Game::createFromObject($gameObject);
        }

        return $listOfGames;
    }

}