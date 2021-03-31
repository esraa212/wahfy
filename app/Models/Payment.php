<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
      public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
