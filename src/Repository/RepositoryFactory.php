<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 25/11/2017
 * Time: 10:38
 */
declare(strict_types = 1);
namespace SISFin\Repository;


class RepositoryFactory
{
    public static function factory(string $modelClass)
    {
        return new DefaultRepository($modelClass);
    }

}