<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Token extends Model
{
    use SoftDeletes;

    protected $fillable = ['token', 'customer_id', 'device_id', 'platform'];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
