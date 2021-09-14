<?php

declare(strict_types=1);

namespace Patterns\Creational\AbstractFactory\Maze;


class MazeClassicFactory extends MazeKit
{
    public function createMaze(): Maze
    {
        return new MazeClassic();
    }

    public function createWall(): Wall
    {
        return new WallClassic();
    }

    public function createRoom(int $roomNumber): Room
    {
        return new RoomClassic($roomNumber);
    }

    public function createDoor(Room $roomInner, Room $roomOuter): Door
    {
        return new DoorClassic($roomInner, $roomOuter);
    }
}
