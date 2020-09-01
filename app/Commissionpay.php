<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commissionpay extends Model
{
    public function getPayment(){
        return $this->belongsTo("App\Payment", "payment_id");
    }
}
