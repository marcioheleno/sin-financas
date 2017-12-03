<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 24/11/2017
 * Time: 10:20
 */

use Dotenv\Dotenv;
use Psr\Http\Message\RequestInterface;
// use Psr\Http\Message\ServerRequestInterface;
use SISFin\Application;
use SISFin\Plugins\AuthPlugin;
use SISFin\Plugins\DbPlugin;
use SISFin\Plugins\RoutePlugin;
use SISFin\Plugins\ViewPlugin;
use SISFin\ServiceContainer;
// use Zend\Diactoros\Response;


require_once __DIR__ . "/../vendor/autoload.php";

if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = new Dotenv(__DIR__ . '/../');
    $dotenv->overload();
}

require_once  __DIR__ . "/../src/helpers.php";

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

$app->get('/', function (RequestInterface $request) use($app) {
    $view = $app->service('view.renderer');
    return $view->render('layout.html.twig');
});

// passando pelo template

//$app->get('/param/{name}', function (ServerRequestInterface $request) use($app) {
//    $view = $app->service('view.renderer');
//    return $view->render('layout.html.twig', ['name' => $request->getAttribute('name')]);
//});
//
//$app->get('/home/{name}/{id}', function (ServerRequestInterface $request) {
//    $response = new Response();
//    $response->getBody()->write("response com emmiter do diactoros");
//    return $response;
//});

require_once __DIR__ . '/../src/controllers/charts.php';
require_once __DIR__ . '/../src/controllers/category-costs.php';
require_once __DIR__ . '/../src/controllers/bill-receives.php';
require_once __DIR__ . '/../src/controllers/bill-pays.php';
require_once __DIR__ . '/../src/controllers/users.php';
require_once __DIR__ . '/../src/controllers/auth.php';
require_once __DIR__ . '/../src/controllers/statements.php';

//echo "<pre>";
//var_dump($_REQUEST);
//var_dump($request);

$app->start();
