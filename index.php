<?php

use MiladRahimi\PhpRouter\Router;
use Src\Controller\FeedbackController;
use Src\Controller\MainController;
use Src\Service\FeedbackService;

require_once 'vendor/autoload.php';


ORM::configure('mysql:host=database;dbname=docker');
ORM::configure('username', 'docker');
ORM::configure('password', 'docker');

$router = Router::create();
$router->setupView('views');

$router->post('/feedback', [FeedbackController::class, 'feedback']);
$router->post('/feedback', [FeedbackService::class, 'feedbackCreate']);