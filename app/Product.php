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
        'name', 'price', 'tax'
    ];

    public function purchase_line_items() {
        return $this->hasMany('App\PurchaseLineItem');
    }
}
