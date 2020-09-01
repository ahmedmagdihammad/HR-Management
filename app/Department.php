<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function getParent(){
        return $this->belongsTo("App\Department", "parent");
    }

    public function getEmployee(){
        return $this->belongsTo("App\Employee", "manager");
    }
}
