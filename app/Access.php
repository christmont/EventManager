<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    public $timestamps = false;

    public function job(){
    	return $this->belongsTo(Job::class);
    }
}
