<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'address',
        'phone',
        'gender',
    ];

    public function reservations()
    {
    	return $this->hasMany('App\Reservation', 'id');
    }

    public function users()
    {
        return $this->hasMany('App\User', 'id');
    }

}
