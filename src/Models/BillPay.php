<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 29/11/2017
 * Time: 15:49
 */

namespace SISFin\Models;


use Illuminate\Database\Eloquent\Model;

class BillPay extends Model
{
    // Mass Assignment
    protected $fillable = [
        'date_launch',
        'name',
        'value',
        'user_id',
        'category_cost_id'
    ];

    public function categoryCost()
    {
        return $this->belongsTo(CategoryCost::class);
    }
}