<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string description
 * @property ExpenseReport expense_report_id
 * @property float amount
 */
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
