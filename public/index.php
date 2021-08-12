<?php


use app\controllers\AuthController;
use app\controllers\MapController;
use app\controllers\SiteController;
use app\controllers\TicTacToeController;
use app\core\Application;

require_once __DIR__ . "/../vendor/autoload.php";

$app = new Application(dirname(__DIR__));

//$app->router->get('/', function () {
//    return "Hello!<br>Ate aqui esta o roteamento feito.";
//});

//$app->router->get('/', 'home');
//$app->router->get('/contact', 'contact');

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);


$app->router->get('/TicTacToe', [TicTacToeController::class, 'init']);
$app->router->post('/TicTacToe', [TicTacToeController::class, 'getMinMaxMove']);

$app->router->get('/map', [MapController::class, 'init']);
$app->router->get('/data', [MapController::class, 'getData']);


$app->run();
