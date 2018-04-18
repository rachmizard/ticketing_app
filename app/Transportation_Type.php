<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation_Type extends Model
{
    protected $table = 'transportation_types';
    protected $fillable = ['description'];

    public function transportations()
    {
    	return $this->hasMany('App\Transportation', 'id');
    }
}
