<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    protected $table = 'rutes';
    protected $primaryKey = 'id';
    protected $fillable = ['depart_at', 'rute_from', 'rute_to', 'price', 'transportation_id'];

    public function reservations()
    {
    	return $this->hasMany('App\Reservation', 'id');
    }


    public function transportations()
    {
    	return $this->belongsTo('App\Transportation', 'transportation_id', 'id');
    }
}
