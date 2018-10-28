<?php

require '../vendor/autoload.php';

$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$container=$app->getContainer();
//middleware
require '../bootstrap/app.php';
require '../bootstrap/container.php';
$app->add(new \App\middleware\SessionMiddleware());

require '../route/web.php';
$app->run();
?>