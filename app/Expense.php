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
    /**
     * Para trabajar con SQL Server (Fechas)
     * @var string
     */
    protected $dateFormat = 'Y-d-m H:i:s.v';

    /*
     * Relacion inversa Pertenece a Uno
     */
    public function expenseReport()
    {
        return $this->belongsTo(ExpenseReport::class);
    }
}
