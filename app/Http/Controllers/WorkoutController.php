<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session_93039;
use App\Http\Resources\Session_93039 as SessionResource;

class WorkoutController extends Controller
{
    	public function index()
    {
        //Get All Sessions
        $sessions = Session_93039::paginate(100);

        //Return A collection of Sessions as A Resource
        return SessionResource::collection($sessions);
    }
    public function insertSession(Request $request){
    	if ($request->isMethod('post')) {
    		$data = $request->all();
    		
    		$sessions = new Session_93039;

    		$sessions->exersice_type = $data['exersice_type'];
    		$sessions->reps = $data['reps'];
    		$sessions->sets = $data['sets'];
    		$sessions->place = $data['place'];
    		$sessions->date_time = $data['date_time'];
    		if($sessions->save()){
    	return response()->json(['response'=>'Session Saved Successfully'],200); 
			}else{
			return response()->json(['response'=>'Failed To Save Session'],401); 	
			}
    		
    	}

}
}
