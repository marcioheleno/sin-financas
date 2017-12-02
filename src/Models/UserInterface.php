<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 26/11/2017
 * Time: 13:36
 */

namespace SISFin\Models;


interface UserInterface
{
    public function getId(): int;

    public function getFullname(): string;

    public function getEmail(): string;

    public function getPassword(): string;


}