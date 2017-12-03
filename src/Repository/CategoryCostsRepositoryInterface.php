<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 02/12/2017
 * Time: 12:09
 */

namespace SISFin\Repository;


interface CategoryCostsRepositoryInterface extends RepositoryInterface
{

    public function sumByPeriod(string $dateStart, string $dateEnd, int $userId): array ;

}