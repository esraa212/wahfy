<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name','industry_id'];
    public function industry()
    {
        return $this->belongsTo('App\Models\Industry');
    }

    public function sub_categories()
    {
        return $this->hasMany('App\Models\SubCategory');
    }

    public function suppliers()
    {
        return $this->hasMany('App\Models\Supplier');
    }
}
