<?php

require '../vendor/autoload.php';

$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

//middleware

require '../bootstrap/app.php';

require '../route/web.php';


$app->run();
?>