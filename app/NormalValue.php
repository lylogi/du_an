<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NormalValue extends Model
{
    protected $table = 'normal_values';
	protected $fillable = ['id','blood_pressure','heart_beat','height','weight','user_id','detail'];

	public function user_nor(){
		return $this->belongsTo('App\User');
	}

}

