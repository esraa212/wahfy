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
     public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    public function attributes(){
    return $this->belongsToMany('App\Models\Attribute', 'products_attributes', 'product_id')->withPivot('value','attribute','quantity','color_id');
    }


}
