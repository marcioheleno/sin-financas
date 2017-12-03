<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 22/11/2017
 * Time: 12:29
 */
declare(strict_types=1);

namespace SISFin;


interface ServiceContainerInterface
{
    /**
     * @param string  $name
     * @param $service
     * @return mixed
     */
    public function add(string $name, $service);

    /**
     * @param string   $name
     * @param callable $callable
     * @return mixed
     */
    public function addLazy(string $name, callable $callable);

    /**
     * @param string $name
     * @return mixed
     */
    public function get(string $name);

    /**
     * @param string $name
     * @return mixed
     */
    public function has(string $name);

}