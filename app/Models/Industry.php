<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{

    protected $fillable=['name'];

    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }
    public function suppliers()
    {
        return $this->hasMany('App\Models\Supplier');
    }
}
