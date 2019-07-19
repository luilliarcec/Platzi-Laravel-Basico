<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{
    /**
     * Para trabajar con SQL Server (Fechas)
     * @var string
     */
    protected $dateFormat = 'Y-d-m H:i:s';

    protected $fillable = [
        'title'
    ];
}
