<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;

class UserController extends Controller
{
   public function showProfile(){
    if(auth()->check()){
      $user_id = auth()->user()->id;
      $user = \App\User::find($user_id);
      return response()->json($user);
    }
    else{
        return response('success');
    }
   }

   public function editProfile(){
       if(auth()->check()){
        $user_id =auth()->user()->id;
        $user = \App\User::find($user_id);
        return response()->json($user);
       }
       else{
           return response('success');
       }  
  }

  public function saveProfile(Request $request){
      // validate & show error msg
      // $this->validate($request,
      //     [

      //     ]
      // )
      $data = $request->all();
        if($request->file('photo')){
            $path = $request->file('photo')->move('storage/profile',$request->file('photo')->getClientOriginalName());
            $data['image_url'] = $path;
        }
        $user_id= auth()->user()->id;
        $user = \App\User::find($user_id);

        $user->update($data);
         

      return response('success');
   }
}

?>

