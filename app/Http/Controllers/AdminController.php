<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;


class AdminController extends Controller
{
	public function __construct(){
		 if(!isset($_SESSION)) 
		    { 
		        session_start(); 
		    }
	}
	public function index(){
		return view('admin.index');
	}
 //    public function register(){
 //    	return view('admin.register');
 //    }

	// public function postRegister(Request $request){
	//valide trong laravel
	// $this->validate($request, [
		//     'username' => 'required|unique:admins|max:255',
		//     'password' => 'required',
		// ]);
	//ko phải
	//  	$data = $request->all();
	//  	$errors = [];
	//  	session_start();
	//  	if(empty($data['username'])){
	//  		$errors['username'] = 'Vui lòng nhập username';
	//  	}
	//  	if(empty($data['password'])){
	//  		$errors['password'] = 'Vui lòng nhập password';
	//  	}elseif ($data['password'] != $data['confirm_password']) {
	//  		$errors['password'] = 'Xác nhận password sai';
	//  	}
	//  	if(empty($data['email'])){
	//  		$errors['email'] = 'Vui lòng nhập email';
	//  	}

	//  	if($errors){
	//  		$_SESSION['register']['errors'] = $errors;
	// 		$_SESSION['register']['data'] = $_POST;
	// 		//header('location: /r.php');
	// 		return redirect()->route('get.register',$_SESSION['register']);
	//  	}else{
	 		
	// 		$admin = new Admin();
	// 		unset($data['confirm_password']);
	// 		$admin->create($data);
	// 		return redirect()->route('get.login');
	//  	}
	//  }

	public function login()
	{
		return view('admin.login');
	}

	public function postLogin(Request $request){
		
		$req= $request->all();
		$data = Admin::where('username', $req['username'])->where('password', $req['password'])->get();
		if($data->count() == 0){
			$request->session()->flash('status', 'Tài khoản hoặc mật khẩu không đúng!!!');
			return back();
		}
		else{
			foreach ($data[0]->toArray() as $key => $value) {
		        $_SESSION['admin'][$key] = $value;
		      }
			  $_SESSION['admin']['avata'] = 'avata.jpg';
			return redirect()->route('user');
		}
	}
	public function profile()
	{
		$name = $_SESSION['admin']['username'];
		$data = Admin::where('username', $name)->get();
		return view('admin.profile',compact('data'));

	}
	public function profileUpdate(Request $request){
		$data = $request->all();
		$id = $_SESSION['admin']['id'];
		$admin = Admin::find($id);
		
		if($request->hasFile('avata')){
          $file = $request->avata;
           $admin->avata = $file->getClientOriginalName() ;
           $file->move('./public/image',$file->getClientOriginalName());
      }

	  if(!empty($data['username'])){
	  	//if($data['username'] != $admin->ussername){
	 	 $admin->username = $data['username'];
	  	//	}
	 	}
	  if(isset($data['email'])){
	 	 $admin->email = $data['email'];
	 	}
	 
	  $admin->save();
	  
	  $_SESSION['admin']='';
	  foreach ($admin->toArray() as $key => $value) {
		        $_SESSION['admin'][$key] = $value;
		      }
		 
		return redirect()->route('user');
	} 
	public function logout(){
		if(isset($_SESSION)) 
		    { 
		        session_destroy(); 
		    }
		return redirect()->route('get.login');
	}
	
}
