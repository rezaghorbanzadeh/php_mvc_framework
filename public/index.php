<?php


use App\controllers\SiteController;
use App\Core\Application;

require_once __DIR__.'/../vendor/autoload.php';




$app = new Application(dirname(__DIR__));


$app->router->get('/', [SiteController::class,"home"]);
$app->router->get('/contact', [SiteController::class,"contact"]);
$app->router->post('/contact', [SiteController::class,"handleContent"]);



$app->run();