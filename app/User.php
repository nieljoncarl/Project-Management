<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ROLES
    public function roles(){
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    public function hasAnyRoles($roles)
    {

        if($this->roles()->whereIn('name',$roles)->first()){
            return true;
        }
        return false;
    }

    public function hasRole($role)
    {
        if($this->roles()->where('name',$role)->first()){
            return true;
        }
        return false;
    }

    // PROJECTS
    public function projects(){
        return $this->belongsToMany('App\Project')->withTimestamps()->withPivot('type');
    }

    public function hasProject($project)
    {
        return $this->projects()->where('project_id',$project->id)->first();
    }

    public function hasAnyProject($project){

        if($this->projects()->whereIn('project_id',$project->id)->first()){
            return true;
        }
        return false;
    }

    public function meetings(){
        return $this->belongsToMany('App\Meeting')->withTimestamps()->withPivot('guest_status');
    }

    public function tasks(){
        return $this->belongsToMany('App\Task')->withTimestamps();
    }

    public function hasTask($task){
        return $this->tasks()->where('task_id',$task->id)->first();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function references()
    {
        return $this->hasMany(Reference::class);
    }
    
    public function files()
    {
        return $this->hasMany(Files::class);
    }
}
