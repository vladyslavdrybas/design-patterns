<?php

declare(strict_types=1);

namespace Patterns\Creational\AbstractFactory\Maze;


final class Direction
{
    public const NORTH = 'NORTH';
    public const SOUTH = 'SOUTH';
    public const WEST = 'WEST';
    public const EAST = 'EAST';

    protected string $direction = '';

    public function __invoke(): string
    {
        return $this->direction;
    }

    public function setEast(): self
    {
        $this->direction = self::EAST;

        return $this;
    }

    public function setWest(): self
    {
        $this->direction = self::WEST;

        return $this;
    }

    public function setNorth(): self
    {
        $this->direction = self::NORTH;

        return $this;
    }

    public function setSouth(): self
    {
        $this->direction = self::SOUTH;

        return $this;
    }
}
