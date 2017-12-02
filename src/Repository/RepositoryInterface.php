<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 25/11/2017
 * Time: 10:17
 */
declare(strict_types=1);
namespace SISFin\Repository;


interface RepositoryInterface
{
    public function all(): array;

    public function find(int $id, bool $failIfNotExist = true);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

    public function findByField(string $field, $value);

    public function findOneBy(array $search);

}