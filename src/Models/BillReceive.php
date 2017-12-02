<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 26/11/2017
 * Time: 23:48
 */

namespace SISFin\Models;


use Illuminate\Database\Eloquent\Model;

class BillReceive extends Model
{
    // Mass Assignment
    protected $fillable = [
        'date_launch',
        'name',
        'value',
        'user_id'
    ];
}