<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use app\controllers\AuthController;
use app\controllers\CatController;
use app\controllers\HomeController;
use app\controllers\MarkUpController;
use app\controllers\ProductController;
use app\controllers\PromotionsController;
use app\controllers\SalesController;
use app\controllers\SiteController;
use app\controllers\OrdersController;
use app\controllers\UserController;
use app\core\Application;

$config = [
    'userClass' => \app\models\User::class,
    'db'=>[
        'dsn'=>$_ENV['DB_DSN'],
        'user'=>$_ENV['DB_USER'],
        'password'=>$_ENV['DB_PASSWORD']
    ]
];

$app = new Application(dirname(__DIR__),$config);

$app->on(Application::EVENT_BEFORE_REQUEST, function(){

});

$app->router->get('/', [HomeController::class, 'dashboard']);
$app->router->get('/users',[SiteController::class,'users']);

$app->router->get('/products',[ProductController::class,'products']);
$app->router->post('/products',[ProductController::class,'products']);

$app->router->get('/users',[UserController::class,'users']);
$app->router->post('/users',[UserController::class,'users']);

$app->router->get('/categories',[CatController::class,'categories']);
$app->router->post('/categories',[CatController::class,'categories']);

$app->router->get('/orders',[OrdersController::class,'orders']);
$app->router->post('/orders',[OrdersController::class,'orders']);

$app->router->get('/profile',[SiteController::class,'profile']);
$app->router->get('/logout', [SiteController::class, 'logout']);

$app->router->get('/login', [SiteController::class, 'login']);
$app->router->post('/login', [SiteController::class, 'login']);

$app->router->get('/register', [SiteController::class, 'register']);
$app->router->post('/register', [SiteController::class, 'register']);


$app->router->get('/promotions', [PromotionsController::class, 'promotions']);
$app->router->post('/promotions', [PromotionsController::class, 'promotions']);

$app->router->get('/sales', [SalesController::class, 'sales']);
$app->router->post('/sales', [SalesController::class, 'sales']);

$app->router->get('/markup', [MarkUpController::class, 'markup']);
$app->router->post('/markup', [MarkUpController::class, 'markup']);

$app->run();