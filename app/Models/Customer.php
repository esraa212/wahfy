<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
class Customer extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $guard = 'customers';
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
     public function getJWTIdentifier()
     {
         return $this->getKey();
     }

      /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
 
}
