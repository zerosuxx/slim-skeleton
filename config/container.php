<?php

use DI\Container;

$container = new Container();

$container->set('config', require __DIR__ . '/config.php');

return $container;
