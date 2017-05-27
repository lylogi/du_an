<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BiochemicalValue extends Model
{
    protected $table = 'biochemical_values';
	protected $fillable = ['id','doctor','hospital','num_Chol','num_CPR','num_Gly','num_THS','num_Trig','user_id','detail'];
	public function user_bio(){
		return $this->belongsTo('App\User');
	}
	
}
