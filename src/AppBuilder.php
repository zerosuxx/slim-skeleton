<?php

declare(strict_types = 1);

namespace App;

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;

class AppBuilder
{

    private string $configDir;

    private ?ContainerInterface $container;

    /**
     * @var array<callable>
     */
    private array $initializers = [];

    public function __construct(string $configDir)
    {
        $this->configDir = $configDir;
    }

    public function withContainer(ContainerInterface $container): self
    {
        $this->container = $container;

        return $this;
    }

    public function withRoutesConfig(string $file = 'routes.php'): self
    {
        $this->initializers['routes'] = $this->requireFile($file);

        return $this;
    }

    public function withMiddlewaresConfig(string $file = 'middlewares.php'): self
    {
        $this->initializers['middlewares'] = $this->requireFile($file);

        return $this;
    }

    public function withContainerConfig(string $file = 'container.php'): self
    {
        $container = $this->requireFile($file);

        $this->withContainer($container);

        return $this;
    }

    public function withConfigs(): self
    {
        $this
            ->withRoutesConfig()
            ->withContainerConfig()
            ->withMiddlewaresConfig();

        return $this;
    }

    public function build(): App
    {
        $app = AppFactory::create(null, $this->container);

        $this->applyInitializers($app, $this->initializers);

        return $app;
    }

    private function applyInitializers(App $app, array $initializers): void
    {
        foreach ($initializers as $initializer) {
            $initializer($app);
        }
    }

    /**
     * @param string $file
     * @return callable|array|object
     */
    private function requireFile(string $file)
    {
        return require $this->configDir . DIRECTORY_SEPARATOR . $file;
    }

}
