<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{
    /**
     * Relacion de 1 a muchos
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    /**
     * Para trabajar con SQL Server (Fechas)
     * @var string
     */
    protected $dateFormat = 'Y-d-m H:i:s.v';

    protected $fillable = [
        'title'
    ];
}
