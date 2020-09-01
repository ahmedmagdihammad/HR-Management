<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    public function getEmployee(){
        return $this->belongsTo("App\Employee", "created_by");
    }

    public function getPayment(){
        return $this->belongsTo("App\Payment", "payment_id");
    }
}
