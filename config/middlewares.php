<?php

declare(strict_types = 1);

use Slim\App;
use Slim\Middleware\ErrorMiddleware;

return static function (App $app): void {
    $config = $app->getContainer()->get('config');
    $debug = isset($config['App']['debug']) ? (bool)$config['App']['debug'] : false;

    $errorMiddleware = new ErrorMiddleware(
        $app->getCallableResolver(),
        $app->getResponseFactory(),
        $debug,
        true,
        true,
    );
    $app->addMiddleware($errorMiddleware);
};
