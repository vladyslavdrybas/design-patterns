<?php

declare(strict_types=1);

namespace Patterns\Creational\AbstractFactory\Maze;


abstract class MapSide
{
    public function Enter(): string
    {
        $structure = explode('\\', static::class);

        return end($structure) . ' Enter';
    }
}
