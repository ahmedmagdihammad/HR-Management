<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    public function getCustomer(){
        return $this->belongsTo("App\Customer", "customer_id");
    }

    public function getEmployee(){
        return $this->belongsTo("App\Employee", "employee_id");
    }

    public function getOffer(){
        return $this->belongsTo("App\Offer", "payment");
    }

    public function getBranch(){
        return $this->belongsTo("App\Branch", "branch_id");
    }

}
