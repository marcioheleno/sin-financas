<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 26/11/2017
 * Time: 00:15
 */

use SISFin\Application;
use SISFin\Plugins\AuthPlugin;
use SISFin\Plugins\DbPlugin;
use SISFin\ServiceContainer;

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

return $app;
