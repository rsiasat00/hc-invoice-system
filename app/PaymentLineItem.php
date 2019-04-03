<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentLineItem extends Model
{
    public function invoice() {
        return $this->belongsTo('App\Invoice');
    }
}
