<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use View;
use DB;
use Session;
class PipedriveController extends Controller
{
    public function dealswebhook(){
		//echo $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/Pipedrive/webhook/deals";
		//echo "<br/>".getcwd();
		echo "<pre>";
		$deal= file_get_contents(getcwd().'/webhook.txt');
		$deal=json_decode($deal);
		$dealdata=array();
		if($deal->meta){
			$action= $deal->meta->action;
			$dealdata['d_id']= $deal->meta->id;
			$dealdata['company_id']= $deal->meta->company_id;
			if($deal->current){
				$dealdata['title']= $deal->current->title;
				$dealdata['stage_id']= $deal->current->stage_id;
				$dealdata['person_id']= $deal->current->person_id;
				$dealdata['creator_user_id']= $deal->current->creator_user_id;
				$dealdata['value']= $deal->current->value?$deal->current->value:'';
				$dealdata['currency']= $deal->current->currency;
				$dealdata['add_time']= $deal->current->add_time;
				$dealdata['update_time']= $deal->current->update_time;
				if(!empty($deal->current->stage_change_time)){
					$dealdata['stage_change_time']= $deal->current->stage_change_time;
				}else{
					$dealdata['stage_change_time']= $deal->current->add_time;
				}
				$dealdata['status']= $deal->current->status;
				$dealdata['visible_to']= $deal->current->visible_to;
				$dealid= DB::table('pd_deals')->where('d_id', $deal->meta->id)->get();
				if(empty($dealid[0])){
					$id = DB::table('pd_deals')->insertGetId($dealdata);
					if($id){
						echo "Aded<br/>";
					}else{
						echo "Error<br/>";
					}
				}else{
					$id=DB::table('pd_deals')
						->where('d_id', $deal->meta->id)
						->update($dealdata);
					if($id){
						echo "Update 1111111111<br/>";
					}	
			    }
			}
		}
		print_r($dealdata);
		print_r($deal); 
    }
}
