<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'name',
        'url',
        'sku',
        'price',
        'in_stock',
        'product_id',
        'retailer_id',
    ];
}
