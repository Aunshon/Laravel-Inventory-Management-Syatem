<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $fillable = [
        'supplierName',
        'companyName',
        'firstContact',
        'secondContact',
        'activation',
        'supplierAddress',
    ];
}
