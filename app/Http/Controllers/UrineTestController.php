<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UrineTest;

class UrineTestController extends Controller
{
	public function create(Request $request){
		$urine = new UrineTest();
		$req = $request->all();
		return $urine->create($req);
	}
	public function update(Request $request){
		$req = $request->all();
		$data = UrineTest::find($req['id']);
		$data->update($req);
		return $data->toJson();
	}
	public function delete(Request $request){
		$id = $request['id'];
		$urine = UrineTest::destroy($id);
		$result ='{
			"status" : "success",
			"detail" : "xoa thanh cong"
		}';
		return $result;
	}
	public function deleteAjax(Request $request){
		if($request->ajax()){
			$id = $request->id;
			$urine = UrineTest::destroy($id);
			return response()->json(['status'=> 'delete']);
		}
	}
}
