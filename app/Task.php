<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Task extends Model
{
    protected $table = 'tasks';
    public $primaryKey = 'id';
    public $timestamps = true;
    use LogsActivity;

    protected $fillable = ['name', 'description', 'start', 'end', 'status'];
    
    protected static $logAttributes = ['name', 'description', 'start', 'end', 'status'];

    
    public function project(){
        return $this->hasOne('App\Project', 'id', 'project_id');
    }

    
    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    // public function projects(){
    //     return $this->belongsToMany('App\Project')->withTimestamps();
    // }

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
