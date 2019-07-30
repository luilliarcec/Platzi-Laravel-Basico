<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{
    /**
     * Para trabajar con SQL Server (Fechas)
     * @var string
     */
    protected $dateFormat = 'Y-d-m H:i:s.v';

    /*
     * Relacion inversa Pertenece a Uno
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacion de 1 a muchos
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    /*
     * Aquellos campos que pueden ser modificados de manera masiva por el usuario
     */
    protected $fillable = [
        'title'
    ];
}
