<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 24/11/2017
 * Time: 17:11
 */

namespace SISFin\Models;


use Illuminate\Database\Eloquent\Model;

class CategoryCost extends Model
{

    //Mass Assignment
    protected $fillable = [
        'name',
        'user_id'
    ];
}