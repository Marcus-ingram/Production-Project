<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'plan'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token'
    ];
    
    public function team()
    {
        return $this->hasOne('App\team');
}

 public function profile()
    {
        return $this->hasOne(Profile::class);
    }
     public function projects()
    {
        return $this->hasMany(Project::class, 'owner_id');
 
 }
 
 public static function byEmail($email){
     return static::where('email', $email)->firstOrFail();
 }
 public function likedPosts()
{
    return $this->morphedByMany('App\Post', 'likeable')->whereDeletedAt(null);
}
public function Subscribed($plan = null){
    if ($plan){
        return $this->plan ==$plan;
    }
}
}
