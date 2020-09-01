<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function getEmployee(){
        return $this->belongsTo("App\Employee", "employee_id");
    }

    public function getExpencestype(){
        return $this->belongsTo("App\Expencestype", "expense_type");
    }

}
