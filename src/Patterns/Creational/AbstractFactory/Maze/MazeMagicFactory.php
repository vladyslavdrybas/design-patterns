<?php

declare(strict_types=1);

namespace Patterns\Creational\AbstractFactory\Maze;

class MazeMagicFactory extends MazeKit
{
    public function createMaze(): Maze
    {
        return new MazeMagic();
    }

    public function createWall(): Wall
    {
        return new WallMagic();
    }

    public function createRoom(int $roomNumber): Room
    {
        return new RoomMagic($roomNumber);
    }

    public function createDoor(Room $roomInner, Room $roomOuter): Door
    {
        return new DoorMagic($roomInner, $roomOuter);
    }
}

