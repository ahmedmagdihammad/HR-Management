<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    public function getCustomer()
    {
    	return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function getFamily()
    {
    	return $this->belongsTo('App\Family', 'family');
    }
}
