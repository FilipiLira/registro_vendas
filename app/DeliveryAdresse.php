<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryAdresse extends Model
{
    protected $fillable = [
        'uf', 'city', 'neighborhood', 'street', 'number', 'postal_code'
    ];
}
