<?php declare(strict_types = 1);

namespace App;

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Middleware\ErrorMiddleware;

class AppBuilder
{

    /**
     * @var string
     */
    private $configDir;

    /**
     * @var callable
     */
    private $routes;

    /**
     * @var ContainerInterface|null
     */
    private $container;

    /**
     * @var callable
     */
    private $errorHandler;


    public function __construct(string $configDir)
    {
        $this->configDir = $configDir;
    }

    public function withRoutes(): self
    {
        $this->routes = require $this->configDir . '/routes.php';

        return $this;
    }

    public function withContainer(?ContainerInterface $container = null): self
    {
        if ($container === null) {
            $container = require $this->configDir . '/container.php';
        }

        $this->container = $container;

        return $this;
    }

    public function withErrorHandler(): self
    {
        $this->errorHandler = static function (App $app): void {
            $callableResolver = $app->getCallableResolver();
            $responseFactory = $app->getResponseFactory();
            $errorMiddleware = new ErrorMiddleware($callableResolver, $responseFactory, true, true, true);
            $app->add($errorMiddleware);
        };

        return $this;
    }

    public function build(): App
    {
        $app = AppFactory::create(null, $this->container);

        $this->apply($app, $this->routes);
        $this->apply($app, $this->errorHandler);

        return $app;
    }

    private function apply(App $app, ?callable $callback = null): void
    {
        if (!$callback) {
            return;
        }

        $callback($app);
    }

}
