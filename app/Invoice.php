<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'invoice_date', 'invoice_number', 'due_date', 'note', 'customer_id'
    ];

    public function customer() {
        return $this->belongsTo('App\User');
    }

    public function purchase_line_items() {
        return $this->hasMany('App\PurchaseLineItem');
    }

    public function payment_line_items() {
        return $this->hasMany('App\PaymentLineItem');
    }
}
