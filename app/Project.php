<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Project extends Model
{
    protected $table = 'projects';
    public $primaryKey = 'id';
    public $timestamps = true;
    use LogsActivity;

    protected $fillable = ['name', 'description', 'outcomes', 'start', 'end', 'status'];
    
    protected static $logAttributes = ['name', 'description', 'outcomes', 'start', 'end', 'status'];

    
    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps()->withPivot('type');
    } 

    public function tasks(){
        return $this->belongsToMany('App\Task')->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    
    public function references()
    {
        return $this->morphMany(Reference::class, 'commentable');
    }

}
