<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Callcenter extends Model
{
    public function getcustomer(){
        return $this->belongsTo("App\customer", "customer_id");
    }
}
