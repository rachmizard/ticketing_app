<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    protected $table = 'transportations';
    protected $fillable = ['code','description', 'seat_qty', 'photo', 'transportation_type_id'];

    public function transportation_types()
    {
    	return $this->belongsTo('App\Transportation_Type', 'transportation_type_id', 'id');
    }

    public function rutes()
    {
    	return $this->hasMany('App\Rute', 'id');
    }
}
