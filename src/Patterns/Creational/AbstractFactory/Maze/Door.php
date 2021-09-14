<?php

declare(strict_types=1);

namespace Patterns\Creational\AbstractFactory\Maze;


abstract class Door extends MapSide
{
    protected Room $roomInner;
    protected Room $roomOuter;

    public function __construct(Room $roomInner, Room $roomOuter)
    {
        $this->roomInner = $roomInner;
        $this->roomOuter = $roomOuter;
    }

    public function getRoomInner(): Room
    {
        return $this->roomInner;
    }

    public function getRoomOuter(): Room
    {
        return $this->roomOuter;
    }

    public function isOpen(): bool
    {
        return true;
    }
}
