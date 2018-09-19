<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMINISTRATOR = "administrator";
    const MODERATOR = "moderator";
    
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
    
    
    public function scopeNotdeleted($query)
    {
        return $query->where('deleted', 0);
    }
    
    public function scopeSamoaktivne($query)
    {
        return $query->where('active', 1);
    }
    
//    public function scopeOlderthan($query, $yearsParam)
//    {
//        return $query->where('years', '>', $yearsParam);
//    }
    
}
