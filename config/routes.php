<?php

use App\Action\HealthCheckAction;
use Slim\Interfaces\RouteCollectorProxyInterface;

return static function (RouteCollectorProxyInterface $router) {
    $router->get('/healthcheck', HealthCheckAction::class);
};
