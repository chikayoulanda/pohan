<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    //
    protected $table = "finance";

    protected $fillable = [
        'dexcription', 'source', 'date', 'amount', 'user_id', 'financial_type_id',
    ];

    public function financial_type()
    {
        return $this->belongsTo('App/FinancialType', 'financial_type_id');
    }

    public function user()
    {
        return $this->belongsTo('App/User', 'user_id');
    }

}
