<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model 
{
    public function getDocument(){
        return $this->hasMany("App\Document", "recid");
    }

    public function getBranch(){
        return $this->belongsTo("App\Branch", "branch_id");
    }

    public function getJob(){
        return $this->belongsTo("App\Job", "job");
    }

    public function getAward(){
        return $this->hasMany("App\Award");
    }

    public function getDiscount(){
        return $this->hasMany("App\Discount");
    }
}
