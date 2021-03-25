<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

    protected $fillable=['name','city_id','area_id','category_id','sub_category_id','industry_id','address'];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function sub_category()
    {
        return $this->belongsTo('App\Models\SubCategory');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
    public function industry()
    {
        return $this->belongsTo('App\Models\Industry');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
         public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }
}
