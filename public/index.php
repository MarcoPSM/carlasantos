<?php


use app\controllers\SiteController;
use app\core\Application;
use app\models\User;

require_once __DIR__ . "/../vendor/autoload.php";
// https://github.com/vlucas/phpdotenv
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'userClass' => User::class,
    'db'=> [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/carla', [SiteController::class, 'carla']);
$app->router->post('/carla', [SiteController::class, 'carla']);

$app->router->get('/testemunhos', [SiteController::class, 'testemunhos']);
$app->router->post('/testemunhos', [SiteController::class, 'testemunhos']);

$app->router->get('/vendido', [SiteController::class, 'vendido']);
$app->router->post('/vendido', [SiteController::class, 'vendido']);

$app->router->get('/vendedores', [SiteController::class, 'vendedores']);
$app->router->post('/vendedores', [SiteController::class, 'vendedores']);

$app->router->get('/compradores', [SiteController::class, 'compradores']);
$app->router->post('/compradores', [SiteController::class, 'compradores']);


$app->run();
