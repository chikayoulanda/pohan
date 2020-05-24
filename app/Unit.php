<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = "units";

    protected $fillable = [
        'name',
    ];

    public function detail_product() 
    {
        return $this->hasMany('App/DetailProduct', 'unit_id');
    }
}
