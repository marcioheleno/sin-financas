<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 28/11/2017
 * Time: 14:48
 */

/**
 * @param $date
 * @return array|string
 */

function dateParse($date)
{
    // DD/MM/YYYY => YYYY/MM/DD
    $dateArray = explode('/', $date);
    $dateArray = array_reverse($dateArray);
    $dateArray = implode("-", $dateArray);
    return $dateArray;
}

/**
 * @param $number
 * @return mixed
 */

function numberParse($number)
{
    // 1.000,50  1000.50
    $newNumber = str_replace('.', '', $number);
    $newNumber = str_replace(',', '.', $newNumber);
    return $newNumber;
}
