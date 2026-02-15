<?php

require '../vendor/autoload.php';
use DI\ContainerBuilder;
use Delight\Auth\Auth;

$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions([
   Engine::class => function()
   {
       return new Engine('../app/views');
   },

   PDO::class => function()
   {
     $driver = 'mysql';
     $host = 'localhost';
     $database_name = 'app3';
     $username = 'root';
     $password = '';

     return new PDO("$driver:host=$host;dbname=$database_name", $username, $password);
   },

    Auth::class => function($container)
    {
        return new Auth($container->get('PDO'));
    }
]);
$container = $containerBuilder->build();

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/php/public/home', ['App\controllers\HomeController', 'index']);
    $r->addRoute('GET', '/php/public/about', ['App\controllers\HomeController', 'about']);
    $r->addRoute('GET', '/php/public/verification', ['App\controllers\HomeController', 'email_verification']);
    $r->addRoute('GET', '/php/public/login', ['App\controllers\HomeCOntroller', 'login']);
    // {id} must be a number (\d+)
});


// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        echo '404';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        echo 'method not allowed';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
//        d($routeInfo[1]);
        $container->call($routeInfo[1], $routeInfo[2]);

//        $controller = new $handler[0];
//        call_user_func([$controller, $handler[1]], $vars);
        // ... call $handler with $vars

        break;
}







