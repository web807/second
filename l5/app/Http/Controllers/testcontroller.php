<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use View;
use DB;
use Session;
class Testcontroller extends Controller
{
	public function __construct()
    {
		if(empty(session('UserID'))){
		    return redirect('Pipedrive/dashboard');
		}
	}
    public function index(Request $request){
		echo "Hello index";
		
    }
}
