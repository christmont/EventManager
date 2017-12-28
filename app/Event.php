<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function guest(){
    	return $this->belongsToMany(Guest::class);
    }
}
