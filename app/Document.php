<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function getCustomer(){
        return $this->belongsTo("App\Customer", "recid");
    }

    public function getPayment(){
        return $this->belongsTo("App\Payment", "recid");
    }

    public function getEmployee(){
        return $this->belongsTo("App\Employee", "recid");
    }
}
