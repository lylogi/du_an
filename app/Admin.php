<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'admins';
    
    protected $fillable =['id','username', 'password','email'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
}
