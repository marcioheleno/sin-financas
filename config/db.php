<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 31/10/2017
 * Time: 11:14
 */

// Credenciais do Banco de Dados
return [
    'default' => [
        'driver' => getenv('DB_DRIVER'),
        'host' => getenv('DB_HOST'),
        'database' => getenv('DB_DATABASE'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => ''
    ]
];