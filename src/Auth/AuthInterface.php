<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 25/11/2017
 * Time: 16:41
 */
declare(strict_types=1);

namespace SISFin\Auth;


use SISFin\Models\UserInterface;

interface AuthInterface
{
    public function login(array $credentials): bool;

    public function check(): bool;

    public function logout(): void;

    public function hashPassword(string $password): string;

    public function user(): ? UserInterface;

}