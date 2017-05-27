<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NormalValue;

class NormalValueController extends Controller
{

	public function create(Request $request){
		$normal = new NormalValue();
		$req = $request->all();
		return $normal->create($req);
	}
	public function update(Request $request){
		$req = $request->all();
		$data = NormalValue::find($req['id']);
		$data->update($req);
		return $data->toJson();
	}
	public function delete(Request $request){
		$id = $request['id'];
		$normal = NormalValue::destroy($id);
		$result ='{
			"status" : "success",
			"detail" : "xoa thanh cong"
		}';
		return $result;
	}
	public function deleteAjax(Request $request){
		if($request->ajax()){
			$id = $request->id;
			$normal = NormalValue::destroy($id);
			return response()->json(['status'=> 'delete']);
		}
	}
	
}
