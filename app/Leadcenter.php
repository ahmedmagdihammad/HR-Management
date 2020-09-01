<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leadcenter extends Model
{
    public function getLead()
    {
        return $this->belongsTo('App\Lead', 'lead_id');
    }
}
