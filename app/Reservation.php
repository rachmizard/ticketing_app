<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'id';
    protected $fillable = ['reservation_code', 'reservation_date', 'customer_id', 'seat_code', 'rute_id', 'user_id',];

    public function customers()
    {
    	return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }

    public function users()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');	
    }

    public function rutes()
    {
    	return $this->belongsTo('App\Rute', 'rute_id', 'id');
    }

}
