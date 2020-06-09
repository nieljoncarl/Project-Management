<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class File extends Model
{
    use LogsActivity;
    protected $table = 'files';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['user_id', 'name', 'description', 'link'];
    protected static $logAttributes = ['user_id', 'name', 'description', 'location', 'link'];
    protected static $logOnlyDirty = true;

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    
    public function project(){
        return $this->hasOne('App\Project', 'id', 'project_id');
    }

    
    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    
    /**
     * Relationship: commentable models
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function fileable()
    {
        return $this->morphTo();
    }
}
