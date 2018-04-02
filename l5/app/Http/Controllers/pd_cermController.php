<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use View;
use DB;
use Session;
class pd_cermController extends Controller
{
	public function dashboard(){
		if(!empty(session('UserID'))){
			$total=DB::table('pd_connecter') 
						   ->where('deleted', 0)
						   ->count();
			$active=DB::table('pd_connecter') 
						   ->where('deleted', 0)
						   ->where('checked', 'on')
						   ->count();
			$data['total']= $total;
			$data['active']= $active;
			$data['unactive']= $total - $active;
			return View::make("dashboard")->with($data);
		}else{
			return redirect('Pipedrive/login');
		}
	}
    public function index(){
		if(!empty(session('UserID'))){
			$connecter=DB::table('pd_connecter as conn') 
			               ->join('pd_deal_stages', 'pd_deal_stages.id', '=', 'conn.deal_stage')
						   ->select('conn.*', 'pd_deal_stages.name')
						   ->where('conn.deleted', 0)
						   ->orderBy('conn.id','DESC')
						   ->get();
			if($connecter){
				$data['conn']=$connecter;
			}else{
				$data['conn']='';
			}
		    return View::make("connecter/index")->with($data);
		}else{
			return redirect('Pipedrive/login');
		}
	}
	 public function addeditNC(Request $request,$id=null){
		if(!empty(session('UserID'))){
			if($request->input('C_Cname')){
				$data=array();
				if($request->input('C_Cname')){
					$data['C_Cname']=$request->input('C_Cname');
				}if($request->input('C_Uref')){
					$data['C_Uref']=$request->input('C_Uref');
				}if($request->input('Pd_token')){
					$data['Pd_token']=$request->input('Pd_token');
				}if($request->input('C_Surl')){
					$data['C_Surl']=$request->input('C_Surl');
				}if($request->input('Pd_dstage')){
					$data['deal_stage']=$request->input('Pd_dstage');
				}if($request->input('sync_delay')){
					$data['delay']=$request->input('sync_delay');
				}
				$data['checked']=!empty($request->input('checked'))?$request->input('checked'):'off';
				if(!empty($request->input('save_edit'))){
					if($request->input('Con_Id')){
						$Con_Id=$request->input('Con_Id');
						$id=DB::table('pd_connecter')
							->where('id', $request->input('Con_Id'))
							->update($data);
						Session::flash('message', 'Update Connection successfully.'); 
						Session::flash('alert-class', 'alert-success');
					}else{
						$id = DB::table('pd_connecter')->insertGetId($data);
						if($id){
							Session::flash('message', 'New Connection successfully Added.'); 
							Session::flash('alert-class', 'alert-success');
						}else{
							Session::flash('message', 'Error: Connection not Added.'); 
							Session::flash('alert-class', 'alert-danger');
						}
					}
					return redirect('Pipedrive/dashboard/connecter');
				}if($request->input('delete')){
					$id=DB::table('pd_connecter')
							->where('id', $request->input('Con_Id'))
							->update(array('deleted'=>'1'));
						Session::flash('message', 'Connection Deleted.'); 
						Session::flash('alert-class', 'alert-success');
						return redirect('Pipedrive/dashboard/connecter');
				}
			}else{
				$data['stages']=DB::table('pd_deal_stages')->get();
				if(!empty($id)){
					$data['conn']=DB::table('pd_connecter')->where('id',$id)->where('deleted','0')->get();
					return View::make("connecter/addeditNC")->with($data);
				}else{
					return View::make("connecter/addeditNC")->with($data);
				}
                
			}
		}
    }
}
