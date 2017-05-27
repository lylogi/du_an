<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UrineTest, App\NormalValue, App\BiochemicalValue,App\User ;

class UserController extends Controller
{
	 public function signUp(Request $request){
		$user = new User();
		$request = $request->all();
		$user->create($request);
		$result =' {
			"status" : "success",
			"detail" : "dang ky thanh cong"
			}';
		return $result;
	}

	public function checkEmail(Request $request){
		$req = $request->all();
		$data = User::where('email', $req['email'])->count();
		if($data != 0){
			$result = '{
				"status" : "fail",
				"detail" : "email da ton tai"
			}';
		}else{
			$result = '{
				"status" : "success",
				"detail" : "email hop le"
			}';
		}
		return $result;
	}

	public function checkUsername(Request $request){
		$req = $request->all();
		$data = User::where('username', $req['username'])->count();
		if($data != 0){
			$result = '{
				"status" : "fail",
				"detail" : "username da ton tai"
			}';
		}else{
			$result = '{
				"status" : "success",
				"detail" : "username hop le"
			}';
		}
		return $result;
	}

	public function logIn(Request $request){
		$req = $request->all();
		$data = User::where('username', $req['username'])->where('password', $req['password'])->select('id')->get();
		if($data->count() == 0){
			$result =' {
				"status" : "fail",
				"detail" : "tai khoan hoac mat khau khong dung"
				}';
			return $result;
		}else{
			//foreach ($data as $row)
			//{
 			//	  $id = $row->id;
			//	}
			$id = $data[0]['id'];
			return redirect()->route('showinfo',$id);
		}
		
	}

	public function update(Request $request){
		$req = $request->all();
		$data = User::find($req['id']);
		$data->update($req);
		return $data;
	}
	public function profile(Request $request){
	 	$req = $request->all();
		$data = User::where('username', $req['username'])->where('password', $req['password'])->get();
		return $data[0];
	}
	
	public function listUser(){
		
		$data = User::paginate(10);
		return view('admin.users',compact('data'));
		
	}	

	public function changeStatus(Request $request){
		if($request->ajax()){
			$id = $request->id;
			$data = User::find($id);
			if($data->status == 0){
				$data->status = 1;
				if($data->update(['status'=>$data->status])){
					return response()->json(['status'=> $data->status]);
				}
			}else{
				$data->status = 0;
				if($data->update(['status'=>$data->status])){
					return response()->json(['status'=> $data->status]);
				}
			}
			//return response()->json(['status'=> $id]);
		}
		return response()->json(['status'=> 'error']);
	}

	public function countNormal(){
		// $normals = User::withCount('urines')->get();
		// $data = array();
		// foreach ($normals as $normals) {
		//    echo $normals->urines_count;
		// }
		// $data = User::all();
		// $users= array();
		// foreach ($data as $key =>$value) {
		// 	$users[$key] = array(
		// 		'user_id' => $value->id,
		// 		'name' => $value->first_name." ".$value->last_name,
		// 		'number' => $value->normals->count(),
		// 		'date' => $value->created_at,
		// 		'data'=>$value->normals
		// 		);
		// }
		// return view('admin.normal', compact('users'));
		//return response()->json($normals);
		//var_dump( json_encode($normals))	;
		$users = User::paginate(10);
		return view('admin.normal', compact('users'));
	}

	public function countBiochemical(){
		$users = User::paginate(10);
		return view('admin.biochemical', compact('users'));
		//var_dump( json_encode($normals));	
	}

	public function countUrine(){
		$users = User::paginate(10);
		return view('admin.urine', compact('users'));
		
	}
	public function postsearchName(Request $request)
	{
		$req = $request->all();
		$name = $req['input_name'];
		//$data = User::where('first_name','like', '%'.$name.'%')->orwhere('last_name','like', '%'.$name.'%')->get();
		$data = User::where('username','like', '%'.$name.'%')->paginate(100);
		return view('admin.users', compact('data'));
		
	}
}
