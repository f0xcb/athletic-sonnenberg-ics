<?php

namespace App\Entity;

use App\Converter\ApiGameConverter;
use DateTimeImmutable;

class Game
{

    private DateTimeImmutable $dateTime;
    private string $league;
    private string $homeTeam;
    private string $guestTeam;
    private ?int $homePoints;
    private ?int $guestPoints;

    public function __construct(
        DateTimeImmutable $dateTime,
        string            $league,
        string            $homeTeam,
        string            $guestTeam,
        ?int              $homePoints,
        ?int              $guestPoints
    )
    {
        $this->dateTime = $dateTime;
        $this->league = $league;
        $this->homeTeam = $homeTeam;
        $this->guestTeam = $guestTeam;
        $this->homePoints = $homePoints;
        $this->guestPoints = $guestPoints;
    }

    public static function createFromObject(object $objGame): self
    {
        $dateTime = ApiGameConverter::getDateTime($objGame);
        $homePoints = ApiGameConverter::getHomePoints($objGame);
        $guestPoints = ApiGameConverter::getGuestPoints($objGame);

        return new self(
            $dateTime,
            $objGame->league,
            $objGame->teaml,
            $objGame->teamr,
            $homePoints,
            $guestPoints
        );
    }

    public function getDateTime(): DateTimeImmutable
    {
        return $this->dateTime;
    }

    public function getHomeTeam(): string
    {
        return $this->homeTeam;
    }

    public function getGuestTeam(): string
    {
        return $this->guestTeam;
    }

    public function getLeague(): string
    {
        return $this->league;
    }

    public function getHomePoints(): ?int
    {
        return $this->homePoints;
    }

    public function getGuestPoints(): ?int
    {
        return $this->guestPoints;
    }

    public function isEnded(): bool
    {
        $now = new DateTimeImmutable();

        return $now->getTimestamp() > $this->getDateTime()->getTimestamp();
    }

}