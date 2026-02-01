<?php

/**
 *
 * create composer.json
 * install composer, (after install comp. there will be create vendor folder)
 * have to connect autoload
 * composer.lock is file which gives news about what downloaded from composer and updates..
 * after wrote own code namespace in composer.json, you have "composer dump-autoload"
 */

/*
 if($_SERVER['REQUEST_URI']=='/php/public/home')
{
 require '../app/controllers/homepage.php';
}


// Start a Session
if (!session_id()) {
    session_start();
}

use Tamtamchik\SimpleFlash\Flash;
use function Tamtamchik\SimpleFlash\flash;


$templates = new League\Plates\Engine('../app/views');
echo $templates->render('about', ['title' => 'Jonathan']);


if($_SERVER['REQUEST_URI']=='/php/public/home')
{
    require '../app/views/homepage.php';
}
 */

require '../vendor/autoload.php';



$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/php/public/home', ['App\controllers\HomeController', 'index']);
    $r->addRoute('GET', '/php/public/about', ['App\controllers\HomeController', 'about']);
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
        $controller = new $handler[0];
        call_user_func([$controller, $handler[1]], $vars);
        // ... call $handler with $vars
        break;
}


//function get_user_handler($vars)
//{
//    d($vars['id']);
//}









