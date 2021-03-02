<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}
