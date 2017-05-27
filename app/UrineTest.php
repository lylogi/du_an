<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrineTest extends Model
{
    protected $table = 'urine_tests';
	protected $fillable =  ['id','doctor','hospital','inBIL','inBLD','inGLU','inKET','inLEU','inNIT','inPH','inPRO','inSG','inUBG','inACD','user_id','detail'];

	public function user_uri(){
		return $this->belongsTo('App\User');
	}

}
