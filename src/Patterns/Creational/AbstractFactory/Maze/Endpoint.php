<?php

declare(strict_types=1);

namespace Patterns\Creational\AbstractFactory\Maze;

use PatternsShare\Executable;

class Endpoint implements Executable
{
    public function execute(): void
    {
        $mazeType = $_GET['maze'];
        switch ($mazeType) {
            case 'magic':
                $mazeFactory = new MazeMagicFactory();
                break;
            default:
                $mazeFactory = new MazeClassicFactory();
        }

        $maze = $this->createMaze($mazeFactory);
        $action = $maze->getRoom(1)->getSide($mazeFactory->createDirectionEast())->Enter();

        echo $action;
    }

    public function createMaze(Mazekit $mazeKit): Maze
    {
        $maze = $mazeKit->createMaze();

        $room1 = $mazeKit->createRoom(1);
        $room2 = $mazeKit->createRoom(2);
        $door = $mazeKit->createDoor($room1, $room2);
        $maze->addRoom($room1);
        $maze->addRoom($room2);

        $room1->setSide($mazeKit->createDirectionEast(), $door);
        $room1->setSide($mazeKit->createDirectionNorth(), $mazeKit->createWall());
        $room1->setSide($mazeKit->createDirectionWest(), $mazeKit->createWall());
        $room1->setSide($mazeKit->createDirectionSouth(), $mazeKit->createWall());

        $room2->setSide($mazeKit->createDirectionEast(), $mazeKit->createWall());
        $room2->setSide($mazeKit->createDirectionNorth(), $mazeKit->createWall());
        $room2->setSide($mazeKit->createDirectionWest(), $door);
        $room2->setSide($mazeKit->createDirectionSouth(), $mazeKit->createWall());

        return $maze;
    }
}
