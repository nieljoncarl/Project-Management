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

    public function projects(){
        return $this->belongsToMany('App\Project')->withTimestamps();
    }
}
