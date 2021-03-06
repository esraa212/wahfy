<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable=['name','category_id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function suppliers()
    {
        return $this->hasMany('App\Models\Supplier');
    }
}
