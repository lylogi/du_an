<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\UrineTest, App\NormalValue, App\BiochemicalValue, App\User ;
class HomeAppController extends Controller {

	public function showInfo($id){
		$user = User::find($id);
		$normal = NormalValue::Where('user_id', $id)->get();
		$urine = UrineTest::where('user_id', $id)->get();
		$biochemical = BiochemicalValue::where('user_id', $id)->get();
		return ['user'=>$user,'normal'=>$normal,'urine_test'=>$urine, 'biochemical'=>$biochemical];
	 }
}