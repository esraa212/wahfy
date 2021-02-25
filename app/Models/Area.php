<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name','city_id'];

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function suppliers()
    {
        return $this->hasMany('App\Models\Supplier');
    }

    public function customers()
    {
        return $this->hasMany('App\Models\Customer');
    }

}
