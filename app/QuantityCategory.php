<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuantityCategory extends Model
{
    //
    protected $table = "quantity_category";

    protected $fillable = [
        'name'
    ];

    public function detail_product()
    {
        return $this->hasMany('App/DetailProduct', 'quantity_category_id');
    }
}
