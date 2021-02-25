<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    protected $fillable=['name','product_category_id'];

    public function product_category()
    {
        return $this->belongsTo('App\Models\ProductCategory');
    }
    
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
