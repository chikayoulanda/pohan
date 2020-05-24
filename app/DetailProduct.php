<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    //
    protected $table = "detail_product";

    protected $fillable = [
        'price', 'weight', 'product_id', 'quantity_category_id', 'unit_id'
    ];

    public function product()
    {
        return $this->belongsTo('App/Product', 'product_id');
    }

    public function quantity_category()
    {
        return $this->belongsTo('App/QuantityCategory', 'quantity_category_id');
    }

    public function unit()
    {
        return $this->belongsTo('App/Unit', 'unit_id');
    }
}
