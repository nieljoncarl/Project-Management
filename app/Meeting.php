<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Meeting extends Model
{
    protected $table = 'meetings';
    public $primaryKey = 'id';
    public $timestamps = true;
    use LogsActivity;


    protected $dates = [
        'created_at',
        'updated_at',
        'approved',
        'started',
        'ended',
        'end',
        'start'
    ];

    protected $fillable = ['name', 'agenda', 'link', 'location', 'start', 'end', 'status'];
    protected static $logAttributes = ['name', 'agenda', 'link', 'location', 'start', 'end', 'status'];
    protected static $logOnlyDirty = true;

    
    public function project(){
        return $this->hasOne('App\Project', 'id', 'project_id');
    }

        
    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps()->withPivot('guest_status');
    }
}
