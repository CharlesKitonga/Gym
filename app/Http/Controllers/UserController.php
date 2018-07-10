<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_93039;
use App\Http\Resources\User_93039 as UserResource;


class UserController extends Controller
{
		public function index()
    {
        //Get Articles
        $users = User_93039::paginate(100);

        //Return A collection of Articles as A Resource
        return UserResource::collection($users);
    }
    public function insertUser(Request $request){
    	if ($request->isMethod('post')) {
    		$data = $request->all();
    		
    		$users = new User_93039;

    		$users->fname = $data['fname'];
    		$users->lname = $data['lname'];
    		$users->email = $data['email'];
    		$users->password = bcrypt($data['password']);
    		if($users->save()){
    	return response()->json(['response'=>'Registration Successful'],200); 
			}else{
			return response()->json(['response'=>'Registration Failed'],401); 	
			}
    		
    	}


    }
}
