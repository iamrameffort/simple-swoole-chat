<?php

declare(strict_types=1);

use Chat\App;
use Chat\Events\OnClose;
use Chat\Events\OnManagerStart;
use Chat\Events\OnMessage;
use Chat\Events\OnOpen;
use Chat\Events\OnRequest;
use Chat\Events\OnStart;

require __DIR__ . '/../vendor/autoload.php';

$dependencies = require __DIR__ . '/../config/dependencies.php';
$settings = require __DIR__ . '/../config/settings.php';
$routes = require __DIR__ . '/../config/routes.php';

$app = new App($settings, $routes, $dependencies);
$app->events([
    'managerStart' => OnManagerStart::class,
    'start'        => OnStart::class,
    'open'         => OnOpen::class,
    'message'      => OnMessage::class,
    'request'      => OnRequest::class,
    'close'        => OnClose::class,
]);

$app->start();
