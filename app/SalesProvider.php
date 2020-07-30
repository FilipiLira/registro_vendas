<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesProvider extends Model
{
    protected $fillable = [
        'provider_id', 'sale_id'
    ];
}
