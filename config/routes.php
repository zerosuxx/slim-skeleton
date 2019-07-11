<?php

use App\Action\IndexAction;
use Slim\Interfaces\RouteCollectorProxyInterface;

return static function (RouteCollectorProxyInterface $router) {
    $router->get('/', IndexAction::class);
};
