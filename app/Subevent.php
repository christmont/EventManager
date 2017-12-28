<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subevent extends Model
{
    public function guest(){
    	return $this->belongstoMany(Guest::class);
    }
}
