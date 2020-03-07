<?php

declare(strict_types = 1);

use App\Action\IndexAction;
use Slim\Interfaces\RouteCollectorProxyInterface;

return static function (RouteCollectorProxyInterface $router): void {
    $router->get('/', IndexAction::class);
};
