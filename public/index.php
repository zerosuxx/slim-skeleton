<?php

use App\AppBuilder;

require dirname(__DIR__) . '/vendor/autoload.php';

$appBuilder = new AppBuilder(dirname(__DIR__) . '/config');
$appBuilder
    ->withContainer()
    ->withRoutes()
    ->withErrorHandler()
    ->build()
    ->run();
