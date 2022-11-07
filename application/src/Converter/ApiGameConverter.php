<?php

namespace App\Converter;

use DateTimeImmutable;

class ApiGameConverter
{

    public static function getDateTime(object $objGame): DateTimeImmutable
    {
        if (property_exists($objGame, 'time')) {
            $minutes = str_pad($objGame->time[1], 2, '0');
            $dateTimeString = sprintf('%s-%s-%s %s:%s', $objGame->date[0], $objGame->date[1], $objGame->date[2], $objGame->time[0], $minutes);

            return DateTimeImmutable::createFromFormat('Y-m-d H:i', $dateTimeString);
        }

        $dateString = sprintf('%s-%s-%s', $objGame->date[0], $objGame->date[1], $objGame->date[2]);

        return DateTimeImmutable::createFromFormat('Y-m-d', $dateString);
    }

    public static function getHomePoints(object $objGame): ?int
    {
        if (!property_exists($objGame, 'scorel')) {
            return null;
        }

        return $objGame->scorel;
    }

    public static function getGuestPoints(object $objGame): ?int
    {
        if (!property_exists($objGame, 'scorer')) {
            return null;
        }

        return $objGame->scorer;
    }

}