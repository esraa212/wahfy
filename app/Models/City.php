<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name'];

    public function areas()
    {
        return $this->hasMany('App\Models\Area');
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
