<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function getReference(){
        return $this->belongsTo("App\Customer", "reference");
    }

    public function getCommission(){
        return $this->belongsTo("App\Commission", "commission_id");
    }

    public function getPayment(){
        return $this->hasMany("App\Payment");
    }

    public function getOffer(){
        return $this->hasMany("App\Offer");
    }
    
}
