<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $timestamps = false;

    public function access(){
	return $this->hasMany(Access::class);
}
public function user(){
	return $this->hasMany(User::class);
}
}
