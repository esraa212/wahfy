<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function product_category()
    {
        return $this->belongsTo('App\Models\ProductCategory');
    }

    public function product_sub_category()
    {
        return $this->belongsTo('App\Models\ProductSubCategory');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier');
    }


}
