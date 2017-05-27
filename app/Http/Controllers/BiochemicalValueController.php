<?php

namespace App\Http\Controllers;
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
		$data->update($req);
		return $data->toJson();
	}
	public function delete(Request $request){
		$id = $request['id'];
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
			$bio = BiochemicalValue::destroy($id);
			return response()->json(['status'=> 'delete']);
		}
	}
}
