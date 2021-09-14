<?php

declare(strict_types=1);

namespace Patterns\Creational\AbstractFactory\Maze;

/**
 * Kit = AbstractFactory
 */
abstract class MazeKit
{
    abstract public function createMaze(): Maze;
    abstract public function createWall(): Wall;
    abstract public function createRoom(int $roomNumber): Room;
    abstract public function createDoor(Room $roomInner, Room $roomOuter): Door;

    public function createDirectionEast(): Direction
    {
        return (new Direction())->setEast();
    }

    public function createDirectionWest(): Direction
    {
        return (new Direction())->setWest();
    }

    public function createDirectionNorth(): Direction
    {
        return (new Direction())->setNorth();
    }

    public function createDirectionSouth(): Direction
    {
        return (new Direction())->setSouth();
    }
}
