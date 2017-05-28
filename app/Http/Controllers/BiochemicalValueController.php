<?php

namespace App\Http\Controllers;
use Auth;
use App\BiochemicalValue;

use Illuminate\Http\Request;

class BiochemicalValueController extends Controller
{
   	public function create(Request $request){
		$bio = new BiochemicalValue();
		$req = $request->all();
		return $bio->create($req);
	}
	public function update(Request $request){
		$req = $request->all();
		$data = BiochemicalValue::find($req['id']);
		if(!array_key_exists('user_id', $req)){
			$result = [
			"status" => "fail",
			"detail" => " Field 'user_id' doesn't have a default value"
			];
		return $result;
		}
		Auth::loginUsingId($req['user_id']);
		$data->update($req);
		return $data->toJson();
	}
	public function delete(Request $request){
		if(!array_key_exists('user_id', $req)){
			$result = [
			"status" => "fail",
			"detail" => " Field 'user_id' doesn't have a default value"
			];
		return $result;
		}
		$id = $request['id'];
		Auth::loginUsingId($req['user_id']);
		$bio = BiochemicalValue::destroy($id);
		$result ='{
			"status" : "success",
			"detail" : "xoa thanh cong"
		}';
		return $result;
	}
	public function deleteAjax(Request $request){
		if($request->ajax()){
			$id = $request->id;
			Auth::loginUsingId($req->user_id);
			$bio = BiochemicalValue::destroy($id);
			return response()->json(['status'=> 'delete']);
		}
	}
}
