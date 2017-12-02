<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 22/11/2017
 * Time: 11:15
 */

// automatic exec migrate
exec(__DIR__ . '/vendor/bin/phinx rollback');
exec(__DIR__ . '/vendor/bin/phinx rollback');
exec(__DIR__ . '/vendor/bin/phinx rollback');
exec(__DIR__ . '/vendor/bin/phinx rollback');
exec(__DIR__ . '/vendor/bin/phinx migrate');
exec(__DIR__ . '/vendor/bin/phinx seed:run -s UsersSeeder');
exec(__DIR__ . '/vendor/bin/phinx seed:run -s CategoryCostsSeeder');
exec(__DIR__ . '/vendor/bin/phinx seed:run -s BillReceivesSeeder');
exec(__DIR__ . '/vendor/bin/phinx seed:run -s BillPaysSeeder');
print ('migration finish\n');
