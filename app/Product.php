<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'tax'
    ];

    public function orders() {
        return $this->hasMany('App\Order');
    }
}
