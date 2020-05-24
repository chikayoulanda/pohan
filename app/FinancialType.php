<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialType extends Model
{
    //
    protected $table = "financial_type";

    protected $fillable = [
        'name',
    ];

    public function finance()
    {
        return $this->hasMany('App/Finance', 'finance_id');
    }
}
