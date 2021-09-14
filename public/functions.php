<?php

declare(strict_types=1);

function projectEnvironment(): string
{
    return getenv('APP_ENV');
}