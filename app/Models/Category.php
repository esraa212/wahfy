<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Category extends Model
{
    protected $fillable=['name','industry_id','image'];
    public function industry()
    {
        return $this->belongsTo('App\Models\Industry');
    }

    public function sub_categories()
    {
        return $this->hasMany('App\Models\SubCategory');
    }

    public function suppliers()
    {
        return $this->hasMany('App\Models\Supplier');
    }
        public static function boot()
    {
        parent::boot();


        static::deleted(function ($category) {

            if (File::exists('public/'.$category->image)) {
                File::delete('public/'.$category->image);
            }
        });
    }
}
