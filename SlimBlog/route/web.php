<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 18/10/18
 * Time: 11:44
 */

use App\Controller\Auth\RegisterController;
use App\Controller\Http\PagesController;

$app->get('/', PagesController::class.':index')->setName('home');
$app->get('/register', PagesController::class.':register')->setName('register');
$app->post('/register', RegisterController::class.':register');
$app->get('/confirmation', PagesController::class.':confirmation')->setName('confirmation');
