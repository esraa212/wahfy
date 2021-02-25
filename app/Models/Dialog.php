<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier');
    }
}
