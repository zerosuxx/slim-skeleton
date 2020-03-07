<?php

declare(strict_types = 1);

use DI\Container;

$container = new Container();

$container->set('config', require __DIR__ . '/config.php');

return $container;
