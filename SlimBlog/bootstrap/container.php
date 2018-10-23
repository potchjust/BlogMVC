<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 18/10/18
 * Time: 14:30
 * fichier devrant contenir les différentes dépendances
 */

use App\Session;

$container = $app->getContainer();

$container['pdo'] = function ($container) {
    $conf = require 'config.php';
    try {
        $pdo = new PDO('mysql:dbname=' . $conf['db']['name'] . ';host=' . $conf['db']['host'], $conf['db']['user'], $conf['db']['pass']);
        return $pdo;
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
};
$container['db'] = function ($container) {
    return new App\Database($container->pdo);
};
$container['auth'] = function ($container) {
    return new \App\Auth($container->db);
};
$container['flash'] = function ($container) {
    return new Slim\Flash\Messages();
};
$container['view'] = function ($container) {
    $path=dirname(__DIR__).'/resources';
    $view = new \Slim\Views\Twig($path, [
        'cache' => false,
        'debug'=>true
    ]);
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container->get('router'), $basePath));
    $view->addExtension(new Twig_Extension_Debug());
    return $view;
};
