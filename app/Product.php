<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";

    protected $fillable = [
        'name', 'image', 'description', 'address',
    ];

    public function detail_product()
    {
        return $this->hasMany('App/DetailProduct', 'product_id');
    }
}
