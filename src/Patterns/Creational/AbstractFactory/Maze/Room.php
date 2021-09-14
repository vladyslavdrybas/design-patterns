<?php

declare(strict_types=1);

namespace Patterns\Creational\AbstractFactory\Maze;


abstract class Room extends MapSide
{
    protected array $sides = [];
    protected int $roomNumber;

    public function __construct(int $roomNumber)
    {
        $this->roomNumber = $roomNumber;
    }

    public function setSide(Direction $direction, MapSide $side): void
    {
        $this->sides[$direction()] = $side;
    }

    public function getSide(Direction $direction): MapSide
    {
        return $this->sides[$direction()];
    }

    public function getRoomNumber(): int
    {
        return $this->roomNumber;
    }
}
