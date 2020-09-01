<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    public function getEmployee(){
        return $this->belongsTo("App\Employee", "employee_id");
    }
}
