<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    public function getEmployee(){
        return $this->belongsTo("App\Employee", "employee_id");
    }
}
