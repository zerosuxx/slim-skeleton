<?php

use App\AppBuilder;

require dirname(__DIR__) . '/vendor/autoload.php';

(new AppBuilder(dirname(__DIR__) . '/config'))
    ->withConfigs()
    ->build()
    ->run();
