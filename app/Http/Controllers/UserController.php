<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   public function showProfile(){
    if(auth()->check()){
      $user_id = auth()->user()->id;
      $user = \App\User::find($user_id);
      return view('user.profile')->with(['user'=>$user]);
    }
    else{
        return redirect(route('login'));
    }
   }

   public function editProfile(){
       if(auth()->check()){
        $user_id =auth()->user()->id;
        $user = \App\User::find($user_id);
        return view('user.profile_edit')->with(['user'=>$user]);
       }
       else{
           return redirect(route('login'));
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
         

      return redirect()->route('profile');
   }
}

?>

