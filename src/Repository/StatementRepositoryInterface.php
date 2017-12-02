<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 30/11/2017
 * Time: 11:41
 */

namespace SISFin\Repository;


interface StatementRepositoryInterface
{
    public function all(string $dateStart, string $dateEnd, int $userId): array;

}