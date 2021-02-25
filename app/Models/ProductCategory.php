<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable=['name'];
    public function product_sub_categories()
    {
        return $this->hasMany('App\Models\ProductSubCategory');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
