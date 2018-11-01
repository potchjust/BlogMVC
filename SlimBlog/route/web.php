<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 18/10/18
 * Time: 11:44
 */

use App\Controller\Auth\ConfirmationController;
use App\Controller\Auth\LoginController;
use App\Controller\Auth\RegisterController;
use App\Controller\Http\CategoryController;
use App\Controller\Http\PagesController;

$app->get('/', PagesController::class.':index')->setName('home');
$app->get('/register', PagesController::class.':register')->setName('register');
$app->post('/register', RegisterController::class.':register');
$app->get('/login', PagesController::class.':login')->setName('login');
$app->post('/login', LoginController::class.':login');
$app->get('/confirm', ConfirmationController::class.':confirmation');
$app->get('/confirmation', PagesController::class.':confirmation')->setName('confirmation');
$app->get('/home', PagesController::class.':home')->setName('user.home');
//routes des catégories
$app->get('/category',CategoryController::class.':index')->setName('category');
$app->post('/category', CategoryController::class.':addcategory');
$app->get('/update/{id}', CategoryController::class.':update')->setName('update');
$app->post('/update/{id}', CategoryController::class.':upgrade')->setName('upgrade');
$app->get('/delete/{id}', CategoryController::class.':delete')->setName('delete');