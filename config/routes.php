<?php

declare(strict_types = 1);

use App\Action\HealthCheckAction;
use Slim\Interfaces\RouteCollectorProxyInterface;

return static function (RouteCollectorProxyInterface $router): void {
    $router->get('/healthcheck', HealthCheckAction::class);
};
