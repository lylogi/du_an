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
    protected $table = 'users';
    
    protected $fillable =['id','first_name','last_name','sex','birthday','address','email','blood_group','code_BHYT','username', 'password','status'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','status'
    ];
    
    public function normals(){
        return $this->hasMany('App\NormalValue');
    }
    public function urines(){
        return $this->hasMany('App\UrineTest');
    }
    public function biochemicals(){
        return $this->hasMany('App\BiochemicalValue');
    }
}
