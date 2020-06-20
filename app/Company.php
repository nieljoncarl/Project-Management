<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function projects(){
        return $this->belongsToMany('App\Project')->withTimestamps();
    }
    
    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
