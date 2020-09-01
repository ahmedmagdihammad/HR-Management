<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commissionexp extends Model
{
    public function getExpense(){
        return $this->belongsTo("App\Expense", "expense_id");
    }
}
