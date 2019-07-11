<?php

use Slim\App;
use Slim\Middleware\ErrorMiddleware;

return static function(App $app) {
    $config = $app->getContainer()->get('config');
    $debug = !empty($config['App']['debug']);

    $errorMiddleware = new ErrorMiddleware(
        $app->getCallableResolver(),
        $app->getResponseFactory(),
        $debug,
        true,
        true
    );
    $app->addMiddleware($errorMiddleware);
};
