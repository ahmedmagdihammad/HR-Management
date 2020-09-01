<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function getCustomer(){
        return $this->belongsTo("App\Customer", "customer_id");
    }
}
