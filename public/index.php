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

//function get_user_handler($vars)
//{
//    d($vars['id']);
//}

use Illuminate\Support\Arr;

$array = [
    ['chary' => ['course' => 'HTML']],
    ['chary' => ['course' => 'PHP']]
];

$result = Arr::pluck($array, 'chary.course');
d($result);

//$mailer = new SimpleMail();
//var_dump($mailer);

var_dump(SimpleMail::make()
    ->setTo('charymwell@gmail.com', 'Charym')
    ->setFrom('info@example.com', 'Admin')
    ->setSubject('Offigenskaya tema')
    ->setMessage('Privet kak dela')
    ->send());

 */

if(!session_id()) @session_start();

require '../vendor/autoload.php';



$faker = Faker\Factory::create();

$pdo = new PDO('mysql:host=localhost;dbname=app3', 'root', '');
$queryFactory = new \Aura\SqlQuery\QueryFactory('mysql');

$insert = $queryFactory->newInsert();

//$insert->into('posts');
//for($i=0; $i < 30; $i++)
//{
//    $insert->cols([
//       'title' => $faker->words(3, true),
//        'content' => $faker->text,
//    ]);
//    $insert->addRow();
//}
//
//$sth = $pdo->prepare($insert->getStatement());
//$sth = execute($insert->getBindValues());






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
        $controller = new $handler[0];
        call_user_func([$controller, $handler[1]], $vars);
        // ... call $handler with $vars
        break;
}







