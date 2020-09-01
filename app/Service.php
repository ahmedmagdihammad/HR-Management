<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function getEmployee(){
        return $this->belongsTo("App\Employee", "company_id");
    }

    public function getCustomer(){
        return $this->belongsTo("App\Customer", "customer_id");
    }
}
