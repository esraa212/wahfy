<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable=['name','supplier_id'];

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier');
    }
    public function product_sub_categories()
    {
        return $this->hasMany('App\Models\ProductSubCategory');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
