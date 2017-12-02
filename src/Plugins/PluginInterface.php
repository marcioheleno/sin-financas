<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 24/11/2017
 * Time: 09:20
 */

namespace SISFin\Plugins;


use SISFin\ServiceContainerInterface;

interface PluginInterface
{
    public function register(ServiceContainerInterface $container);

}