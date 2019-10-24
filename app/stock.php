<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $fillable = [
        'stockid',
        'stockName',
        'quantity',
        'supplierid',
        'categoryid',
        'buingPrice',
        'sellingPrice',
        'expireDate',
    ];
}
