<?php

namespace App\Http\Controllers;
use App\User;
use App\Like;
use App\Review;
use Alert;
use Hash;
use Eloquent;
use Validator;
use Image;
use Storage;
use Auth;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class userController extends Controller
{


    public function profile(Request $request){
      $idUser = auth()->user()->id;

      $reviews = DB::table('reviews')
              ->where('id_user', '=', $idUser)
              ->count();
      $likes = DB::table('likes')
                ->where('id_user', '=', $idUser)
                ->count();

      return view('userProfile', compact('likes', 'reviews'));
      }

      // sistemare controller
    public function modify(Request $request){

      $first_name = $request->input('first_name');
      $last_name = $request->input('last_name');
      $phone = $request->input('phone');
      $mobile = $request->input('mobile');
      $email = $request->input('email');
      $password = $request->input('password');
      $password2 = $request->input('password2');
      $ok=0;
      //  $input = Input::all();
      $user = auth()->user();

      if($first_name != $user->name) {
        User::where('id', $user->id)->update(['name' => $first_name]);
        $ok=1;
      }

      if($last_name != $user->surname) {
        User::where('id', $user->id)->update(['surname' => $last_name]);
        $ok=1;

      }

      if($phone != $user->telephone) {
        User::where('id', $user->id)->update(['telephone' => $phone]);
        $ok=1;
      }
      if($mobile != $user->mobile){
         User::where('id', $user->id)->update(['mobile' => $mobile]);
         $ok=1;

       }
      if($email != $user->email) {
        User::where('id', $user->id)->update(['email' => $email]);
        $ok=1;

        }

      $current_password = auth()->user()->password;
      if(Hash::check($password, $current_password))
      {
        $user_id = auth()->user()->id;
        $obj_user = User::find($user_id);
        $obj_user->password = Hash::make($password2);;
        $obj_user->save();
        $ok=1;

      }
      return $ok;
  }

  public function modifyImage(Request  $request){
    if($request->hasFile('avatar')) {
    $user = auth()->user();
    $name = $request->avatar->getClientOriginalName();
    $request->avatar->storeAs('public',$name);
    File::delete('storage/' . $user->avatar);
    User::where('id', $user->id)->update(['avatar' => $name]);

     return 'success';
    }
    return "fail";






}
}
