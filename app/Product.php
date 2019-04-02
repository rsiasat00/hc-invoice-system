<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'tax', 'order_id'
    ];

    public function orders() {
        return $this->hasMany('App\Order');
    }
}
