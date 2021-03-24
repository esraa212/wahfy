<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
protected $fillable=['value','type'];
    public function products(){
    return $this->belongsToMany('App\Models\Product', 'products_attributes');
    }
}
