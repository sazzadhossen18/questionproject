<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;



class ProfileController extends Controller
{
   

	public function userprofile(){
		$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('frontend.user.user-setting',compact('user'));
	}



    public function update(Request $request){
    	$data = User::find(Auth::user()->id);
    	$data->updated_at = $request->updated_at;

        if ($request->file('image')){
            
        	$file = $request->file('image');
        	@unlink(public_path('upload/user_images/'.$data->image));
        	$filename =date('YmdHi').$file->getClientOriginalName();
        	$file->move(public_path('upload/user_images'), $filename);
        	$data['image']= $filename;
        }
        $data->save();
        return redirect()->back()->with('flash_message_success','Profile Picture Updated Successfully');
    }




     public function passwordUpdate(Request $request){
    	if(Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->current_password])){
    		$user = User::find(Auth::user()->id);
    		$user->name = $request->name;
       		$user->email = $request->email;
    		$user->password = bcrypt($request->new_password);
    		$user->save();
    		
    		return redirect()->back()->with('flash_message_success','Profile changed successfully');
    	}



    }





}
