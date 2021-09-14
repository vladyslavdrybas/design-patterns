<?php

declare(strict_types=1);

use PatternsShare\Executable;

require_once('Psr4Autoloader.php');
require_once('functions.php');

class Kernel
{
    protected Psr4Autoloader $loader;
    protected Executable $endpoint;

    public function setUp(): void
    {
        $this->setEnvironmentVariables();
        $this->registerNamespaces();
        $this->findEndpoint();
    }

    public function execute(): void
    {
        $this->endpoint->execute();
    }

    protected function registerNamespaces(): void
    {
        $this->loader = new Psr4Autoloader();
        $this->loader->register();

        $namespaces = require_once('namespaces.php');

        foreach ($namespaces as $prefix => $dir) {
            $this->loader->addNamespace(
                $prefix,
                getenv('KERNEL_PROJECT_DIR') . $dir
            );
        }
    }

    protected function setEnvironmentVariables(): void
    {
        putenv('KERNEL_PROJECT_DIR=' . dirname(__DIR__));

        $envFiles = [
            dirname(__DIR__) . '/.env',
        ];

        foreach ($envFiles as $envFile) {
            if (file_exists($envFile) === false) {
                continue;
            }
            $envVariables = file($envFile);
            foreach ($envVariables as $assignment) {
                $assignment = trim($assignment);
                if ($assignment === '' || strpos($assignment, '#') === 0) {
                    continue;
                }

                putenv($assignment);
            }
        }
    }

    protected function findEndpoint(): Executable
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $lastChar = substr($path, -1,1);
        if ($lastChar === '/') {
            $path = substr($path, 0, -1);
        }

        $endpoints = require_once('endpoints.php');

        if (array_key_exists($path, $endpoints)) {
            return $this->endpoint = new $endpoints[$path];
        }

        echo 'Unknown endpoint';
        exit;
    }
}
