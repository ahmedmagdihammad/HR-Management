<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs'; 

    public function getDepartment(){
        return $this->belongsTo("App\Department", "department_id");
    }
}
