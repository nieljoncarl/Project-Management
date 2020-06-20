<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    
    public function project(){
        return $this->belongsToMany('App\Project')->withTimestamps()->withPivot('type');
    }
    
    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }
    
    public function projects(){
        return $this->hasMany(Project::class);
    }
}
