<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /*
     * Relacion inversa Pertenece a Uno
     */
    public function expenseReport()
    {
        return $this->belongsTo(ExpenseReport::class);
    }
}
