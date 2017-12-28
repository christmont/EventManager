<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    public function event(){
    	return $this->belongsToMany(Event::class);
    }
    public function subevent(){
    	return $this->belongsToMany(Subevent::class);
    }
}
