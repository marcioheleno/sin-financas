<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 31/10/2017
 * Time: 11:30
 */

use Dotenv\Dotenv;

require __DIR__ . '/vendor/autoload.php';

if (file_exists(__DIR__ . '/.env')) {
    $dotenv = new Dotenv(__DIR__);
    $dotenv->overload();
}
$db = include __DIR__ . '/config/db.php';
list(
    'driver' => $adapter,
    'host' => $host,
    'database' => $name,
    'username' => $user,
    'password' => $pass,
    'charset'  => $charset,
    'collation' => $collation
    ) = $db['default'];

return [
   'paths' => [
       'migrations' => [
           __DIR__ . '/db/migrations'
       ],
       'seeds' => [
           __DIR__ . '/db/seeds'
       ]
   ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'default',
        'default' => [
            'adapter' => $adapter,
            'host' => $host,
            'name' => $name,
            'user' => $user,
            'pass' => $pass,
            'charset' => $charset,
            'collation' => $collation
        ]

    ]
];