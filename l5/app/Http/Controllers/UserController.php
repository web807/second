<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use View;
use DB;
use Session;
class UserController extends Controller
{
	public function __construct()
    {
		if(empty(session('UserID'))){
			return redirect('login');
		}
	}
    public function index(Request $request){
		if ($request->session()->exists('UserID')){
			return redirect('Pipedrive/dashboard');
		}
		if($request->input('uemail') && $request->input('pwd')){
			$users = DB::table('Users')
                    ->where('email',$request->input('uemail'))
					->where('password',$request->input('pwd'))    
                    ->get();
			session(['UserID' => $users[0]]);
			if ($request->session()->exists('UserID')){
				return redirect('Pipedrive/dashboard');
			}
		}else{
			return view('login');
		}
    }
	public function logout(Request $request){
		if(!empty($_POST['id'])){
			$request->session()->forget('UserID');
			if(empty($request->session()->exists('UserID'))){
				echo json_encode(array('logout'=>'1',));	
			}
		} 
	}
	public function setting(){
		if(!empty(session('UserID'))){
			$data=array();
			$user=DB::table('Users')
					->where('id',session('UserID')->id) 
					->get();
			$data['user'] =$user[0];
			return View::make("userprofile")->with($data);
		}else{
			return redirect('Pipedrive/login');
		}
	}
	public function addedituser(Request $request){
		if($_POST['upwd1'] == $_POST['upwd2']){
			if($_POST['uid']){
			   $update= DB::table('users')
				->where('id', $_POST['uid'])
				->update(['name' => $_POST['uname'],'email' => $_POST['uemail'],'password' => $_POST['upwd1']]);
				if($update){
					Session::flash('message', 'Account Update successfully.'); 
					Session::flash('alert-class', 'alert-success');
				}
				return redirect('Pipedrive/dashboard');
			}
		}else{
			Session::flash('message', 'Password not match.'); 
            Session::flash('alert-class', 'alert-danger');
            return redirect('Pipedrive/dashboard/setting');			
		}
	}
}
