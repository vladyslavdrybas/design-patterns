<?php

declare(strict_types=1);

namespace Patterns\Creational\AbstractFactory\Maze;


abstract class Maze
{
    protected array $rooms = [];

    public function addRoom(Room $room)
    {
        $this->rooms[$room->getRoomNumber()] = $room;
    }

    public function getRoom(int $roomNumber): Room
    {
        return $this->rooms[$roomNumber];
    }
}
