<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier');
    }
}
