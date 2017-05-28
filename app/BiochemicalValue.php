<?php

namespace App;
use Venturecraft\Revisionable\Revisionable;
use Venturecraft\Revisionable\Revision;
use Illuminate\Database\Eloquent\Model;

class BiochemicalValue extends Revisionable 
{
	protected $revisionEnabled = true;
    protected $historyLimit = 500;
	protected $revisionCleanup = true;
    protected $table = 'biochemical_values';
	protected $fillable = ['id','doctor','hospital','num_Chol','num_CPR','num_Gly','num_THS','num_Trig','user_id','detail'];
	public static  function boot()
    {
        BiochemicalValue::deleted(function ($model) {
            // Insert into 'revisions' (calling getTable probably not necessary, but to be safe).
            \DB::table((new Revision())->getTable())->insert([
                [
                    'revisionable_type' => $model->getMorphClass(),
                    'revisionable_id' => $model->id,
                    'key' => 'deleted',
                    'old_value' => null,
                    'new_value' => null,
                    'user_id' => (\Auth::check() ? \Auth::user()->id : null),
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ]
            ]);
        });
    }
	public function user_bio(){
		return $this->belongsTo('App\User');
	}
	
}
